<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Subject;
use App\Admin\Schedule;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        // $divisons[0]->semester;
        // echo "<pre>";
        // print_r($divisons->toarray());
        // die;
        return view('admin.schedule.index',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.schedule.create',compact('subjects'));
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
            "date" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "top_scorer" => "required",
            "no_of_top_scorers" => "required|numeric",
        ],[
            "subject_id.required" => "Please Select Subject",
            "date.required" => "Please Select Date",
            "start_time.required" => "Please Enter Start Time",
            "end_time.required" => "Please Enter End Time",
            "top_scorer.required" => "Please Enter Top Scorer",
            "no_of_top_scorers.required" => "Please Enter No Of Top Scorers",
            "no_of_top_scorers.numeric" => "No Of Top Scorers Must Be Numeric"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;

        $schedule = new Schedule();
        $schedule->subject_id = $request->subject_id;
        $schedule->date = $request->date;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->top_scorer = $request->top_scorer;
        $schedule->no_of_top_scorers = $request->no_of_top_scorers;

        $schedule->save();

        return redirect('admin/schedule');
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
        $schedule = Schedule::find($id);
        $subjects = Subject::all();
        // echo "<pre>";
        // print_r($mcq_question->toarray());
        // die;
        return view('admin.schedule.edit',compact('schedule','subjects'));
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
            "date" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "top_scorer" => "required",
            "no_of_top_scorers" => "required|numeric",
        ],[
            "subject_id.required" => "Please Select Subject",
            "date.required" => "Please Select Date",
            "start_time.required" => "Please Enter Start Time",
            "end_time.required" => "Please Enter End Time",
            "top_scorer.required" => "Please Enter Top Scorer",
            "no_of_top_scorers.required" => "Please Enter No Of Top Scorers",
            "no_of_top_scorers.numeric" => "No Of Top Scorers Must Be Numeric"
        ]);

        $schedule = Schedule::find($id);
        $schedule->subject_id = $request->subject_id;
        $schedule->date = $request->date;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->top_scorer = $request->top_scorer;
        $schedule->no_of_top_scorers = $request->no_of_top_scorers;

        $schedule->save();

        return redirect('admin/schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::destroy($id);
        return redirect('admin/schedule');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Delete':
                Schedule::destroy($ids);
                break;
        }
    }
}
