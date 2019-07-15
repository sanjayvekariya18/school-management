<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty\Stream;
use App\Faculty\Semester;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        // $semesters[0]->stream;
        // echo "<pre>";
        // print_r($semesters->toarray());
        // die;
        return view('faculty.semester.index',compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streams = Stream::all();
        return view('faculty.semester.create',compact('streams'));
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
            "stream_id" => "required",
            "sem_name" => "required|numeric"
        ],[
            "stream_id.required" => "Please Select Stream",
            "sem_name.required" => "Please Select Semester",
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $semester = new Semester();
        $semester->stream_id = $request->stream_id;
        $semester->sem_name = $request->sem_name;

        $semester->save();

        return redirect('faculty/semester');
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
        $semester = Semester::find($id);
        $streams = Stream::all();
        // echo "<pre>";
        // print_r($semester->toarray());
        // die;
        return view('faculty.semester.edit',compact('semester','streams'));
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
            "stream_id" => "required",
            "sem_name" => "required|numeric"
        ],[
            "stream_id.required" => "Please Select Stream",
            "sem_name.required" => "Please Select Semester",
        ]);

        ///  echo "<pre>";
        // print_r($request->toarray());
        // die;
        $semester = Semester::find($id);
        $semester->sem_name = $request->sem_name;
        
        $semester->save();

        return redirect('faculty/semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Semester::destroy($id);
        return redirect('faculty/semester');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Active':
                Semester::whereIn('id',$ids)
                ->update(['status'=>1]);
                break;
            case 'Deactive':
                Semester::whereIn('id',$ids)
                ->update(['status'=>0]);
                break;
            case 'Delete':
                Semester::destroy($ids);
                break;
        }
    }
}
