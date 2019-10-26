<?php

namespace App\Http\Controllers;

use App\Sport;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::paginate(10);

        return view('sports.index', ['sports' => $sports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('sports.create', ['teachers' => $teachers]);
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
            'sport_id' =>                   ['required', Rule::unique('sports'), 'max:10'],
            'description' =>                ['required', Rule::unique('sports'), 'max:100'],
            'teacher_incharge_id' =>        'required|exists:teachers,id',
            'master_coach' =>               'max:100',
            'sub_coach' =>                  'max:100',
            'physio' =>                     'max:100',
            'master_coach_wage' =>          'nullable|numeric',
            'sub_coach_wage' =>             'nullable|numeric',
            'annual_allocated_budget' =>    'nullable|numeric',
        ]);

        $sport = new Sport;
        $sport->sport_id = $request->input('sport_id');
        $sport->description = $request->input('description');
        $sport->teacher_incharge_id = $request->input('teacher_incharge_id');
        $sport->master_coach = $request->input('master_coach');
        $sport->sub_coach = $request->input('sub_coach');
        $sport->physio = $request->input('physio');
        $sport->master_coach_wage = $request->input('master_coach_wage');
        $sport->sub_coach_wage = $request->input('sub_coach_wage');
        $sport->annual_allocated_budget = $request->input('annual_allocated_budget');
        $sport->save();

        return redirect()->route('sports.index', ['sports' => Sport::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        $teachers = Teacher::all();
        return view('sports.edit', ['sport' => $sport, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        $validatedData = $request->validate([
            'sport_id' =>                   ['required', Rule::unique('sports')->ignore($sport->id), 'max:10'],
            'description' =>                ['required', Rule::unique('sports')->ignore($sport->id), 'max:100'],
            'teacher_incharge_id' =>        'required|exists:teachers,id',
            'master_coach' =>               'max:100',
            'sub_coach' =>                  'max:100',
            'physio' =>                     'max:100',
            'master_coach_wage' =>          'nullable|numeric',
            'sub_coach_wage' =>             'nullable|numeric',
            'annual_allocated_budget' =>    'nullable|numeric',
        ]);

        $sport->sport_id = $request->input('sport_id');
        $sport->description = $request->input('description');
        $sport->teacher_incharge_id = $request->input('teacher_incharge_id');
        $sport->master_coach = $request->input('master_coach');
        $sport->sub_coach = $request->input('sub_coach');
        $sport->physio = $request->input('physio');
        $sport->master_coach_wage = $request->input('master_coach_wage');
        $sport->sub_coach_wage = $request->input('sub_coach_wage');
        $sport->annual_allocated_budget = $request->input('annual_allocated_budget');
        $sport->save();

        return redirect()->route('sports.index', ['sports' => Sport::paginate(10)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        Sport::destroy($sport->id);
    }
}
