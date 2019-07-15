<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty\Semester;
use App\Faculty\Subject;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        // $subjects[0]->semester;
        // echo "<pre>";
        // print_r($subjects->toarray());
        // die;
        return view('faculty.subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all();
        return view('faculty.subject.create',compact('semesters'));
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
            "semester_id" => "required",
            "sub_name" => "required|alpha",
            "sub_code" => "required|numeric"
        ],[
            "semester_id.required" => "Please Select Semester",
            "sub_name.required" => "Please Enter Subject Name",
            "sub_name.alpha" => "Subject Name Must Be Alphabet",
            "sub_code.required" => "Please Enter Subject code",
            "sub_code.numeric" => "Subject Code Must Be Numeric"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $subject = new Subject();
        $subject->semester_id = $request->semester_id;
        $subject->sub_name = $request->sub_name;
        $subject->sub_code = $request->sub_code;

        $subject->save();

        return redirect('faculty/subject');
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
        $subject = Subject::find($id);
        $semesters = Semester::all();
        // echo "<pre>";
        // print_r($semester->toarray());
        // die;
        return view('faculty.subject.edit',compact('subject','semesters'));
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
        // echo "<pre>";
        // print_r($request->toarray());
        // die;
        $request->validate([
            "semester_id" => "required",
            "sub_name" => "required|alpha",
            "sub_code" => "required|numeric"
        ],[
            "semester_id.required" => "Please Select Semester",
            "sub_name.required" => "Please Enter Subject Name",
            "sub_name.alpha" => "Subject Name Must Be Alphabet",
            "sub_code.required" => "Please Enter Subject code",
            "sub_code.numeric" => "Subject Code Must Be Numeric"
        ]);

        //  echo "<pre>";
        // print_r($request->toarray());
        // die;
        $subject = Subject::find($id);
        $subject->sub_name = $request->sub_name;
        $subject->sub_code = $request->sub_code;
        
        $subject->save();

        return redirect('faculty/subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::destroy($id);
        return redirect('faculty/subject');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Delete':
                Subject::destroy($ids);
                break;
        }
    }
}
