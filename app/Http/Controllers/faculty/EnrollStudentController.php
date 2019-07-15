<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty\Student;
use App\Faculty\Stream;
use App\Faculty\Semester;
use App\Faculty\Divison;
use App\Faculty\Enroll_student;

class EnrollStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enroll_students = Enroll_student::all();
        // $faculties[0]->stream;
        // echo "<pre>";
        // print_r($faculties->toarray());
        // die;
        return view('faculty.enroll_student.index',compact('enroll_students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $streams = Stream::all();
        $semesters = Semester::all();
        $divisons = Divison::all();
        return view('faculty.enroll_student.create',compact('students','streams','semesters','divisons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $request->validate([
            "student_id" => "required",
            "stream_id" => "required",
            "semester_id" => "required",
            "divison_id" => "required"
        ],[
            "student_id.required" => "Please Select Student",
            "stream_id.required" => "Please Select Stream",
            "semester_id.required" => "Please Select Semester",
            "divison_id.required" => "Please Select Divison"
        ]);

        $enroll_student = new Enroll_student();
        $enroll_student->student_id = $request->student_id;
        $enroll_student->stream_id = $request->stream_id;
        $enroll_student->semester_id = $request->semester_id;
        $enroll_student->divison_id = $request->divison_id;
        // print_r($faculty_subject->toarray());
        // die;
        $enroll_student->save();
        return redirect('faculty/enroll_student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enroll_student = Enroll_student::find($id);
        $streams = Stream::all();
        $semesters = Semester::all();
        $divisons = Divison::all();
        // echo "<pre>";
        // print_r($enroll_student->toarray());
        // die;
        return view('faculty.enroll_student.edit',compact('enroll_student','streams','semesters','divisons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /// echo "<pre>";
        // print_r($request->toarray());
        // die;

        $request->validate([
            "student_id" => "required",
            "stream_id" => "required",
            "semester_id" => "required",
            "divison_id" => "required"
        ],[
            "student_id.required" => "Please Select Student",
            "stream_id.required" => "Please Select Stream",
            "semester_id.required" => "Please Select Semester",
            "divison_id.required" => "Please Select Divison"
        ]);

        $enroll_student = Enroll_student::find($id);
        $enroll_student->student_id = $request->student_id;
        $enroll_student->stream_id = $request->stream_id;
        $enroll_student->semester_id = $request->semester_id;
        $enroll_student->divison_id = $request->divison_id;
        // print_r($enroll_student->toarray());
        // die;
        $enroll_student->save();
        return redirect('faculty/enroll_student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo "<pre>";
        // print_r($id);
        // die;
        Enroll_student::destroy($id);
        return redirect('faculty/enroll_student');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Active':
            Enroll_student::whereIn('id',$ids)
                ->update(['status'=>1]);
                break;
            case 'Deactive':
            Enroll_student::whereIn('id',$ids)
                ->update(['status'=>0]);
                break;
            case 'Delete':
            Enroll_student::destroy($ids);
                break;
        }
    }
}
