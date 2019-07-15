<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty\Stream;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams = Stream::all();
        // $streams[0]->semester;
        // echo "<pre>";
        // print_r($streams->toarray());
        // die;
        return view('faculty.stream.index',compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.stream.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* echo "<pre>";
        print_r($request->toarray());
        die;*/

        $stream = new Stream();
        $stream->stream_name = $request->stream_name;

        $stream->save();

        return redirect('faculty/stream');
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
        $stream = Stream::find($id);
        // echo "<pre>";
        // print_r($stream->toarray());
        // die;
        return view('faculty.stream.edit',compact('stream'));
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
        //  echo "<pre>";
        // print_r($request->toarray());
        // die;
        $stream = Stream::find($id);
        $stream->stream_name = $request->stream_name;

        $stream->save();

        return redirect('faculty/stream');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stream::destroy($id);
        return redirect('faculty/stream');
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
