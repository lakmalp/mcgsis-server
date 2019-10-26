<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stats = collect([
            'student_cnt' => Student::count(),
            'student_disabled_cnt' => Student::whereNotNull('disability_id')->count(),
            'teacher_cnt' => Teacher::count()
        ]);
        return view('home', ['stats' => $stats]);
    }
}
