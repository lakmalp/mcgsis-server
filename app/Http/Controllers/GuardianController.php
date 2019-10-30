<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGuardian;
use App\Http\Requests\UpdateGuardian;
use Illuminate\Validation\Rule;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardians = Guardian::paginate(10);

        return view('guardians.index', ['guardians' => $guardians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('guardians.create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuardian $request)
    {
        $guardian = new Guardian;
        $guardian->student_id =         $request->input('student_id');
        $guardian->f_initials =         $request->input('f_initials');
        $guardian->f_surname =          $request->input('f_surname');
        $guardian->f_contact_no =       $request->input('f_contact_no');
        $guardian->f_occupation =       $request->input('f_occupation');
        $guardian->f_work_place =       $request->input('f_work_place');
        $guardian->m_initials =         $request->input('m_initials');
        $guardian->m_surname =          $request->input('m_surname');
        $guardian->m_contact_no =       $request->input('m_contact_no');
        $guardian->m_occupation =       $request->input('m_occupation');
        $guardian->m_work_place =       $request->input('m_work_place');
        $guardian->g_initials =         $request->input('g_initials');
        $guardian->g_surname =          $request->input('g_surname');
        $guardian->g_contact_no =       $request->input('g_contact_no');
        $guardian->is_old_boy =         $request->input('is_old_boy');
        $guardian->total_donations =    $request->input('total_donations');
        $guardian->save();

        return redirect()->route('guardians.index', ['guardians' => Guardian::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function show(Guardian $guardian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function edit(Guardian $guardian)
    {
        $students = Student::all();
        return view('guardians.edit', ['guardian' => $guardian, 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuardian $request, Guardian $guardian)
    {
        $guardian->f_initials =         $request->input('f_initials');
        $guardian->f_surname =          $request->input('f_surname');
        $guardian->f_contact_no =       $request->input('f_contact_no');
        $guardian->f_occupation =       $request->input('f_occupation');
        $guardian->f_work_place =       $request->input('f_work_place');
        $guardian->m_initials =         $request->input('m_initials');
        $guardian->m_surname =          $request->input('m_surname');
        $guardian->m_contact_no =       $request->input('m_contact_no');
        $guardian->m_occupation =       $request->input('m_occupation');
        $guardian->m_work_place =       $request->input('m_work_place');
        $guardian->g_initials =         $request->input('g_initials');
        $guardian->g_surname =          $request->input('g_surname');
        $guardian->g_contact_no =       $request->input('g_contact_no');
        $guardian->is_old_boy =         $request->input('is_old_boy');
        $guardian->total_donations =    $request->input('total_donations');
        $guardian->save();

        return redirect()->route('guardians.index', ['guardians' => Guardian::paginate(10)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guardian $guardian)
    {
        Guardian::destroy($guardian->id);
    }
}
