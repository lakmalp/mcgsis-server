<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::paginate(10);

        return view('schools.index', ['schools' => $schools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
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
            'description' =>                ['required', Rule::unique('schools'), 'max:100'],
        ]);

        $school = new School;
        $school->description = $request->input('description');
        $school->save();

        return redirect()->route('schools.index', ['schools' => School::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('schools.show', ['school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('schools.edit', ['school' => $school]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $validatedData = $request->validate([
            'description' =>                ['required', Rule::unique('schools'), 'max:100'],
        ]);

        $school->description = $request->input('description');
        $school->save();

        return redirect()->route('schools.index', ['schools' => School::paginate(10)]);
    }

    /**
     * Search the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function searchForm(Request $request)
    {
        $description = $request->input('description');

        $result = School::where('description', 'LIKE', $description)->get();

        return view('schools.edit', ['schools' => $result]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        School::destroy($school->id);
    }
}
