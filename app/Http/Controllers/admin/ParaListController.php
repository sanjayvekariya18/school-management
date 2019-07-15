<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Subject;
use App\Admin\Para_list;
class ParaListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $para_lists = Para_list::all();

        return view('admin.para_list.index',compact('para_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.para_list.create',compact('subjects'));
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
            "para_name" => "required",
            "para_description" => "required",
           
            "correct_ans" => "required",
            "mark" => "required",
            "negative_mark" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "para_name.required" => "Please Select Paragraph Name",
            "para_description.required" => "Please Select  Paragraph Description",
            
            "correct_ans.required" => "Please Select Subject",
            "mark.required" => "Please Select Subject",
            "negative_mark.required" => "Please Select Subject"
            // "divison_name.required" => "Please Enter Divison Name",
            // "divison_name.alpha" => "Please Enter Only Alphabets"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;
        $para_list = new Para_list();
        $para_list->subject_id = $request->subject_id;
        $para_list->para_name = $request->para_name;
        $para_list->para_description = $request->para_description;
        $para_list->correct_ans = $request->correct_ans;
        $para_list->mark = $request->mark;
        $para_list->negative_mark = $request->negative_mark;
        $para_list->save();
        return redirect('admin/para_list');

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
        $para_list = Para_list::find($id);
        $subjects = Subject::all();
        // echo "<pre>";
        // print_r($faculty->toarray());
        // die;
        return view('admin.para_list.edit',compact('para_list','subjects'));
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
            "para_name" => "required",
            "para_description" => "required",
           
            "correct_ans" => "required",
            "mark" => "required",
            "negative_mark" => "required"
        ],[
            "subject_id.required" => "Please Select Subject",
            "para_name.required" => "Please Select Paragraph Name",
            "para_description.required" => "Please Select  Paragraph Description",
            
            "correct_ans.required" => "Please Select Subject",
            "mark.required" => "Please Select Subject",
            "negative_mark.required" => "Please Select Subject"
            // "divison_name.required" => "Please Enter Divison Name",
            // "divison_name.alpha" => "Please Enter Only Alphabets"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;
        $para_list = Para_list::find($id);
        $para_list->subject_id = $request->subject_id;
        $para_list->para_name = $request->para_name;
        $para_list->para_description = $request->para_description;
       
        $para_list->correct_ans = $request->correct_ans;
        $para_list->mark = $request->mark;
        $para_list->negative_mark = $request->negative_mark;
        $para_list->save();
        return redirect('admin/para_list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Para_list::destroy($id);
        return redirect('admin/para_list');
    }
      public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            
            case 'Delete':
            Para_list::destroy($ids);
                break;
        }
    }
}

