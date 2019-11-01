<?php

namespace App\Http\Controllers;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;

use App\Student;
use App\House;
use App\Sport;
use App\Disability;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(10);

        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $houses = House::all();
        $sports = Sport::all();
        $disabilities = Disability::all();
        return view('students.create', ['houses' => $houses, 'sports' => $sports, 'disabilities' => $disabilities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validations goes here

        $student = new Student;
        $student->admission_no = $request->input('admission_no');
        $student->first_names = $request->input('first_names');
        $student->surname = $request->input('surname');
        $student->dob = $request->input('dob');
        $student->date_of_admission = $request->input('date_of_admission');
        $student->house_id = $request->input('house_id');
        $student->grade_class = $request->input('grade_class');
        $student->add_1 = $request->input('add_1');
        $student->add_2 = $request->input('add_2');
        $student->city = $request->input('city');
        $student->gnd = $request->input('gnd');
        $student->sport_1_id = $request->input('sport_1_id');
        $student->sport_2_id = $request->input('sport_2_id');
        $student->sport_3_id = $request->input('sport_3_id');
        $student->is_scholar = $request->input('is_scholar');
        $student->schol_amount = $request->input('schol_amount');
        $student->has_special_need = $request->input('has_special_need');
        $student->disability_id = $request->input('disability_id');
        $student->remarks = $request->input('remarks');
        if ($request->has('avatar')) {
            // Get image file
            $image = $request->file('avatar');
            // Make an image name based on user name and current timestamp
            $name = Str::slug($request->input('first_names') . '_' . $request->input('surname')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $student->avatar = $filePath;
        }
        $student->olevel_nine_a = $request->input('olevel_nine_a');
        $student->ol_mahindian = $request->input('olevel_nine_a') == "0" ? 0 : $request->input('ol_mahindian');
        $student->grade_5_passed = $request->input('grade_5_passed');
        $student->schol_mahindian = $request->input('grade_5_passed') == "0" ? 0 : $request->input('schol_mahindian');
        $student->save();

        return redirect()->route('students.index', ['students' => Student::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $houses = House::all();
        $sports = Sport::all();
        $disabilities = Disability::all();
        return view('students.edit', ['student' => $student, 'houses' => $houses, 'sports' => $sports, 'disabilities' => $disabilities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //validations goes here

        $student->admission_no = $request->input('admission_no');
        $student->first_names = $request->input('first_names');
        $student->surname = $request->input('surname');
        $student->dob = $request->input('dob');
        $student->date_of_admission = $request->input('date_of_admission');
        $student->house_id = $request->input('house_id');
        $student->grade_class = $request->input('grade_class');
        $student->add_1 = $request->input('add_1');
        $student->add_2 = $request->input('add_2');
        $student->city = $request->input('city');
        $student->gnd = $request->input('gnd');
        $student->sport_1_id = $request->input('sport_1_id');
        $student->sport_2_id = $request->input('sport_2_id');
        $student->sport_3_id = $request->input('sport_3_id');
        $student->is_scholar = $request->input('is_scholar');
        if ($request->input('is_scholar') == "1") {
            $student->schol_amount = $request->input('schol_amount');
        } else {
            $student->schol_amount = null;
        }
        $student->has_special_need = $request->input('has_special_need');
        if ($request->input('has_special_need') == "1") {
            $student->disability_id = $request->input('disability_id');
        } else {
            $student->disability_id = null;
        }
        $student->remarks = $request->input('remarks');
        if ($request->has('avatar')) {
            // Get image file
            $image = $request->file('avatar');
            // Make an image name based on user name and current timestamp
            $name = Str::slug($request->input('first_names') . '_' . $request->input('surname')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $student->avatar = $filePath;
        }
        $student->olevel_nine_a = $request->input('olevel_nine_a');
        $student->ol_mahindian = $request->input('olevel_nine_a') == "0" ? 0 : $request->input('ol_mahindian');
        $student->grade_5_passed = $request->input('grade_5_passed');
        $student->schol_mahindian = $request->input('grade_5_passed') == "0" ? 0 : $request->input('schol_mahindian');
        $student->save();

        return redirect()->route('students.index', ['students' => Student::paginate(10)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
    }
}
