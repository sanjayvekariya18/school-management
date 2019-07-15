<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty\Subject;
use App\Faculty\Tof_question;

class TofQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tof_questions = Tof_question::all();

        return view('faculty.tof_question.index',compact('tof_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();

        return view('faculty.tof_question.create',compact('subjects'));
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
            "question" => "required",
            "correct_ans" => "required",
            "mark" => "required",
            "negative_mark" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "question.required" => "Please Select Question",
            "correct_ans.required" => "Please Select Subject",
            "mark.required" => "Please Select Subject",
            "negative_mark.required" => "Please Select Subject"
            // "divison_name.required" => "Please Enter Divison Name",
            // "divison_name.alpha" => "Please Enter Only Alphabets"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;
        $tof_questions = new Tof_question();
        $tof_questions->subject_id = $request->subject_id;
        $tof_questions->question = $request->question;
        $tof_questions->correct_ans = $request->correct_ans;
        $tof_questions->mark = $request->mark;
        $tof_questions->negative_mark = $request->negative_mark;


        $tof_questions->save();

        return redirect('faculty/tof_question');
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
          $tof_question = Tof_question::find($id);
        $subjects = Subject::all();
        // echo "<pre>";
        // print_r($faculty->toarray());
        // die;
        return view('faculty.tof_question.edit',compact('tof_question','subjects'));
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
            "question" => "required",
            "correct_ans" => "required",
            "mark" => "required",
            "negative_mark" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "question.required" => "Please Select Question",
            "correct_ans.required" => "Please Select Subject",
            "mark.required" => "Please Select Subject",
            "negative_mark.required" => "Please Select Subject"
            // "divison_name.required" => "Please Enter Divison Name",
            // "divison_name.alpha" => "Please Enter Only Alphabets"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;
        $tof_questions = Tof_question::find($id);
        $tof_questions->subject_id = $request->subject_id;
        $tof_questions->question = $request->question;
        $tof_questions->correct_ans = $request->correct_ans;
        $tof_questions->mark = $request->mark;
        $tof_questions->negative_mark = $request->negative_mark;


        $tof_questions->save();

        return redirect('faculty/tof_question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tof_question::destroy($id);
        return redirect('faculty/tof_question');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            
            case 'Delete':
            Tof_question::destroy($ids);
                break;
        }
    }
}