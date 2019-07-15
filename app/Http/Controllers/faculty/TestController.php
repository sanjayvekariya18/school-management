<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\faculty\Subject;
use App\faculty\Faculty;
use App\faculty\Semester;
use App\faculty\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return view('faculty.test.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $faculties = Faculty::all();
        $semesters = Semester::all();
        return view('faculty.test.create',compact('subjects','faculties','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "subject_id" => "required",
            "semester_id" => "required",
            "faculty_id" => "required",
            "test_name" => "required",
            "description" => "required",
            "no_of_ques" => "required|numeric",
            "total_mark" => "required|numeric",
            "pass_mark" => "required|numeric",
            "test_duration" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "semester_id.required" => "Please Select Semester",
            "faculty_id.required" => "Please Select Faculty",
            "test_name.required" => "Please Enter Test Name",
            "description.required" => "Please Enter Description",
            "no_of_ques.required" => "Please Enter No Of Question",
            "no_of_ques.numeric" => "No Of Question Must Be Numeric",
            "total_mark.required" => "Please Enter Total Mark",
            "total_mark.numeric" => "Total Mark Must Be Numeric",
            "pass_mark.required" => "Please Enter Passing Mark",
            "pass_mark.numeric" => "Passing Mark Must Be Numeric",
            "test_duration.required" => "Please Enter Test Duration"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $test = new Test();
        $test->subject_id = $request->subject_id;
        $test->semester_id = $request->semester_id;
        $test->faculty_id = $request->faculty_id;
        $test->test_name = $request->test_name;
        $test->description = $request->description;
        $test->no_of_ques = $request->no_of_ques;
        $test->total_mark = $request->total_mark;
        $test->pass_mark = $request->pass_mark;
        $test->test_duration = $request->test_duration;

        $test->save();

        return redirect('faculty/test');
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
        $test = Test::find($id);
        $subjects = Subject::all();
        $semesters = Semester::all();
        $faculties = Faculty::all();
        // echo "<pre>";
        // print_r($mcq_question->toarray());
        // die;
        return view('faculty.test.edit',compact('test','subjects','semesters','faculties'));
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
        $request->validate([
            "subject_id" => "required",
            "semester_id" => "required",
            "faculty_id" => "required",
            "test_name" => "required",
            "description" => "required",
            "no_of_ques" => "required|numeric",
            "total_mark" => "required|numeric",
            "pass_mark" => "required|numeric",
            "test_duration" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "semester_id.required" => "Please Select Semester",
            "faculty_id.required" => "Please Select Faculty",
            "test_name.required" => "Please Enter Test Name",
            "description.required" => "Please Enter Description",
            "no_of_ques.required" => "Please Enter No Of Question",
            "no_of_ques.numeric" => "No Of Question Must Be Numeric",
            "total_mark.required" => "Please Enter Total Mark",
            "total_mark.numeric" => "Total Mark Must Be Numeric",
            "pass_mark.required" => "Please Enter Passing Mark",
            "pass_mark.numeric" => "Passing Mark Must Be Numeric",
            "test_duration.required" => "Please Enter Test Duration"
        ]);
        
        $test = Test::find($id);
        $test->subject_id = $request->subject_id;
        $test->semester_id = $request->semester_id;
        $test->faculty_id = $request->faculty_id;
        $test->test_name = $request->test_name;
        $test->description = $request->description;
        $test->no_of_ques = $request->no_of_ques;
        $test->total_mark = $request->total_mark;
        $test->pass_mark = $request->pass_mark;
        $test->test_duration = $request->test_duration;

        $test->save();

        return redirect('faculty/test');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Test::destroy($id);
        return redirect('faculty/test');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Delete':
                Test::destroy($ids);
                break;
        }
    }
}
