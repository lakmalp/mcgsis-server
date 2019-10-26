<?php

namespace App\Http\Controllers;

use App\Disability;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DisabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disabilities = Disability::paginate(10);

        return view('disabilities.index', ['disabilities' => $disabilities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disabilities.create');
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
            'description' =>                ['required', Rule::unique('disabilities'), 'max:100'],
        ]);

        $disability = new Disability;
        $disability->description = $request->input('description');
        $disability->save();

        return redirect()->route('disabilities.index', ['disabilities' => Disability::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disability  $disability
     * @return \Illuminate\Http\Response
     */
    public function show(Disability $disability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disability  $disability
     * @return \Illuminate\Http\Response
     */
    public function edit(Disability $disability)
    {
        return view('disabilities.edit', ['disability' => $disability]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disability  $disability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disability $disability)
    {
        $validatedData = $request->validate([
            'description' =>                ['required', Rule::unique('disabilities')->ignore($disability->id), 'max:100'],
        ]);

        $disability->description = $request->input('description');
        $disability->save();

        return redirect()->route('disabilities.index', ['disabilities' => Disability::paginate(10)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disability  $disability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disability $disability)
    {
        Disability::destroy($disability->id);
    }
}
