<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Test;
use App\Admin\Test_question;

class TestQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test_questions = Test_question::all();
        // $test_questions[0]->stream;
        // echo "<pre>";
        // print_r($test_question->toarray());
        // die;
        return view('admin.test_question.index',compact('test_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::all();
        return view('admin.test_question.create',compact('tests'));
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
            "test_id" => "required",
            "question_type" => "required",
            "context_id" => "required|numeric"
        ],[
            "test_id.required" => "Please Select Test Id",
            "question_type.required" => "Please Select Question Type",
            "context_id.required" => "Please Select Context Id",
            "context_id.numeric" => "Context Id  Must Be Numeric"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $test_question = new Test_question();
        $test_question->test_id = $request->test_id;
        $test_question->question_type = $request->question_type;
        $test_question->context_id = $request->context_id;

        $test_question->save();

        return redirect('admin/test_question');
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
        $test_question = Test_question::find($id);
        $tests = Test::all();
        // echo "<pre>";
        // print_r($test_question->toarray());
        // die;
        return view('admin.test_question.edit',compact('test_question','tests'));
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
            "test_id" => "required",
            "question_type" => "required",
            "context_id" => "required|numeric"
        ],[
            "test_id.required" => "Please Select Test Id",
            "question_type.required" => "Please Select Question Type",
            "context_id.required" => "Please Select Context Id",
            "context_id.numeric" => "Context Id  Must Be Numeric"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $test_question = Test_question::find($id);
        $test_question->test_id = $request->test_id;
        $test_question->question_type = $request->question_type;
        $test_question->context_id = $request->context_id;

        $test_question->save();

        return redirect('admin/test_question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Test_question::destroy($id);
        return redirect('admin/test_question');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
           
            case 'Delete':
            Test_question::destroy($ids);
                break;
        }
    }
}
