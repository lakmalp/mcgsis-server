<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Str;

use App\User;
use Illuminate\Http\Request;
//use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
  use RegistersUsers;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::paginate(10);

    return view('users.index', ['users' => $users]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'usertype' => ['required', 'string'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    User::create([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'usertype' => $request->input('usertype'),
      'password' => Hash::make($request->input('password')),
    ]);

    return redirect()->route('users.index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('users.edit', ['user' => $user]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $validatedData = $request->validate([
      'name' => ['required', 'string', 'max:255'],
    ]);

    $user->name = $request->input('name');
    $user->save();

    return redirect()->route('users.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    User::destroy($user->id);
  }
}
