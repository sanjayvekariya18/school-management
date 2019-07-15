<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Faculty;
use App\Admin\Stream;
use App\Admin\Semester;
use App\Admin\Divison;
use App\Admin\Subject;
use App\Admin\Faculty_subject;

class FacultySubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty_subjects = Faculty_subject::all();
        // $faculties[0]->stream;
        // echo "<pre>";
        // print_r($faculties->toarray());
        // die;
        return view('admin.faculty_subject.index',compact('faculty_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        $streams = Stream::all();
        $semesters = Semester::all();
        $divisons = Divison::all();
        $subjects = Subject::all();
        return view('admin.faculty_subject.create',compact('faculties','streams','semesters','divisons','subjects'));
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
            "faculty_id" => "required",
            "stream_id" => "required",
            "semester_id" => "required",
            "divison_id" => "required",
            "subject_id" => "required"
        ],[
            "faculty_id.required" => "Please Select Faculty",
            "stream_id.required" => "Please Select Stream",
            "semester_id.required" => "Please Select Semester",
            "divison_id.required" => "Please Select Divison",
            "subject_id.required" => "Please Select Subject"
        ]);

        $faculty_subjects = new Faculty_subject();
        $faculty_subjects->faculty_id = $request->faculty_id;
        $faculty_subjects->stream_id = $request->stream_id;
        $faculty_subjects->semester_id = $request->semester_id;
        $faculty_subjects->divison_id = $request->divison_id;
        $faculty_subjects->subject_id = $request->subject_id;
        // print_r($faculty_subject->toarray());
        // die;
        $faculty_subjects->save();
        return redirect('admin/faculty_subject');
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
        $faculty_subject = Faculty_subject::find($id);
        $faculties = Faculty::all();
        $streams = Stream::all();
        $semesters = Semester::all();
        $divisons = Divison::all();
        $subjects = Subject::all();
        // echo "<pre>";
        // print_r($faculty_subjects->toarray());
        // die;
        return view('admin.faculty_subject.edit',compact('faculty_subject','faculties','streams','semesters','divisons','subjects'));
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
            "faculty_id" => "required",
            "stream_id" => "required",
            "semester_id" => "required",
            "divison_id" => "required",
            "subject_id" => "required"
        ],[
            "faculty_id.required" => "Please Select Faculty",
            "stream_id.required" => "Please Select Stream",
            "semester_id.required" => "Please Select Semester",
            "divison_id.required" => "Please Select Divison",
            "subject_id.required" => "Please Select Subject"
        ]);

        $faculty_subject = Faculty_subject::find($id);
        $faculty_subject->faculty_id = $request->faculty_id;
        $faculty_subject->stream_id = $request->stream_id;
        $faculty_subject->semester_id = $request->semester_id;
        $faculty_subject->divison_id = $request->divison_id;
        $faculty_subject->subject_id = $request->subject_id;
        // print_r($faculty_subject->toarray());
        // die;
        $faculty_subject->save();
        return redirect('admin/faculty_subject');
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
        Faculty_subject::destroy($id);
        return redirect('admin/faculty_subject');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Active':
                Faculty_subject::whereIn('id',$ids)
                ->update(['status'=>1]);
                break;
            case 'Deactive':
                Faculty_subject::whereIn('id',$ids)
                ->update(['status'=>0]);
                break;
            case 'Delete':
                Faculty_subject::destroy($ids);
                break;
        }
    }
}
