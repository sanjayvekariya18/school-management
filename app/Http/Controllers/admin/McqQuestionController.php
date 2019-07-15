<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Subject;
use App\Admin\Mcq_question;
class McqQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mcq_questions = Mcq_question::all();
        return view('admin.mcq_question.index',compact('mcq_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.mcq_question.create',compact('subjects'));
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
            "op1" => "required",
            "op2" => "required",
            "op3" => "required",
            "op4" => "required",
            "correct_ans" => "required",
            "mark" => "required|numeric",
            "negative_mark" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "question.required" => "Please Enter Question",
            "op1.required" => "Please Enter Option 1",
            "op2.required" => "Please Enter Option 2",
            "op3.required" => "Please Enter Option 3",
            "op4.required" => "Please Enter Option 4",
            "correct_ans.required" => "Please Enter Correct Answer",
            "mark.required" => "Please Enter Mark",
            "mark.numeric" => "Mark Must Be Numeric",
            "negative_mark.required" => "Please Enter Negative Mark"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $mcq_question = new Mcq_question();
        $mcq_question->subject_id = $request->subject_id;
        $mcq_question->question = $request->question;
        $mcq_question->op1 = $request->op1;
        $mcq_question->op2 = $request->op2;
        $mcq_question->op3 = $request->op3;
        $mcq_question->op4 = $request->op4;
        $mcq_question->correct_ans = $request->correct_ans;
        $mcq_question->mark = $request->mark;
        $mcq_question->negative_mark = $request->negative_mark;

        $mcq_question->save();

        return redirect('admin/mcq_question');
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
        $mcq_question = Mcq_question::find($id);
        $subjects = Subject::all();
        // echo "<pre>";
        // print_r($mcq_question->toarray());
        // die;
        return view('admin.mcq_question.edit',compact('mcq_question','subjects'));
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
            "subject_id" => "required",
            "question" => "required",
            "op1" => "required",
            "op2" => "required",
            "op3" => "required",
            "op4" => "required",
            "correct_ans" => "required",
            "mark" => "required|numeric",
            "negative_mark" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "question.required" => "Please Enter Question",
            "op1.required" => "Please Enter Option 1",
            "op2.required" => "Please Enter Option 2",
            "op3.required" => "Please Enter Option 3",
            "op4.required" => "Please Enter Option 4",
            "correct_ans.required" => "Please Enter Correct Answer",
            "mark.required" => "Please Enter Mark",
            "mark.numeric" => "Mark Must Be Numeric",
            "negative_mark.required" => "Please Enter Negative Mark"
        ]);
        
        $mcq_questions = Mcq_question::find($id);
        $mcq_questions->subject_id = $request->subject_id;
        $mcq_questions->question = $request->question;
        $mcq_questions->op1 = $request->op1;
        $mcq_questions->op2 = $request->op2;
        $mcq_questions->op3 = $request->op3;
        $mcq_questions->op4 = $request->op4;
        $mcq_questions->correct_ans = $request->correct_ans;
        $mcq_questions->mark = $request->mark;
        $mcq_questions->negative_mark = $request->negative_mark;

        $mcq_questions->save();

        return redirect('admin/mcq_question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mcq_question::destroy($id);
        return redirect('admin/mcq_question');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Delete':
                Mcq_question::destroy($ids);
                break;
        }
    }
}
