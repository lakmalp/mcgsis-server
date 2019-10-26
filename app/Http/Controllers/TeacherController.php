<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Sport;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);

        return view('teachers.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        $sports = Sport::all();
        $genders = collect(["Male", "Female"]);
        return view('teachers.create', ['schools' => $schools, 'sports' => $sports, 'genders' => $genders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new Teacher;
        $teacher->teacher_id = $request->input('teacher_id');
        $teacher->first_names = $request->input('first_names');
        $teacher->surname = $request->input('surname');
        $teacher->contact_no = $request->input('contact_no');
        $teacher->address = $request->input('address');
        $teacher->gender = $request->input('gender');
        $teacher->class = $request->input('class');
        $teacher->qualification = $request->input('qualification');
        $teacher->date_of_appointment = $request->input('date_of_appointment');
        $teacher->service = $request->input('service');
        $teacher->prev_school_id = $request->input('prev_school_id');
        $teacher->teacher_in_charge = $request->input('teacher_in_charge');
        $teacher->save();

        return redirect()->route('teachers.index', ['teachers' => Teacher::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $schools = School::all();
        $sports = Sport::all();
        $genders = collect(["Male", "Female"]);
        return view('teachers.edit', ['teacher' => $teacher, 'schools' => $schools, 'sports' => $sports, 'genders' => $genders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->teacher_id = $request->input('teacher_id');
        $teacher->first_names = $request->input('first_names');
        $teacher->surname = $request->input('surname');
        $teacher->contact_no = $request->input('contact_no');
        $teacher->address = $request->input('address');
        $teacher->gender = $request->input('gender');
        $teacher->class = $request->input('class');
        $teacher->qualification = $request->input('qualification');
        $teacher->date_of_appointment = $request->input('date_of_appointment');
        $teacher->service = $request->input('service');
        $teacher->prev_school_id = $request->input('prev_school_id');
        $teacher->teacher_in_charge = $request->input('teacher_in_charge');
        $teacher->save();

        return redirect()->route('teachers.index', ['teachers' => Teacher::paginate(10)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
    }
}
