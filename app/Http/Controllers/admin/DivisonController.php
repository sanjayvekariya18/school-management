<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Semester;
use App\Admin\Divison;

class DivisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisons = Divison::all();
        // $divisons[0]->semester;
        // echo "<pre>";
        // print_r($divisons->toarray());
        // die;
        return view('admin.divison.index',compact('divisons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all();
        return view('admin.divison.create',compact('semesters'));
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
            "divison_name" => "required|alpha"
        ],[
            "semester_id.required" => "Please Select Semester",
            "divison_name.required" => "Please Enter Divison Name",
            "divison_name.alpha" => "Please Enter Only Alphabets"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $divison = new Divison();
        $divison->semester_id = $request->semester_id;
        $divison->divison_name = $request->divison_name;

        $divison->save();

        return redirect('admin/divison');


        
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
        $divison = Divison::find($id);
        $semesters = Semester::all();
        // echo "<pre>";
        // print_r($semester->toarray());
        // die;
        return view('admin.divison.edit',compact('divison','semesters'));
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
            "semester_id" => "required",
            "divison_name" => "required|alpha"
        ],[
            "semester_id.required" => "Please Select Semester",
            "divison_name.required" => "Please Enter Divison Name",
            "divison_name.alpha" => "Please Enter Only Alphabets"
        ]);

        ///  echo "<pre>";
        // print_r($request->toarray());
        // die;
        $divison = Divison::find($id);
        $divison->divison_name = $request->divison_name;
        
        $divison->save();

        return redirect('admin/divison');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Divison::destroy($id);
        return redirect('admin/divison');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Delete':
                Divison::destroy($ids);
                break;
        }
    }
}
