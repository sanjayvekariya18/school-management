<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Stream;
use App\Admin\Faculty;
use App\Role;
use DB;
use App\User;
use Hash;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        // $faculties[0]->stream;
        // echo "<pre>";
        // print_r($faculties->toarray());
        // die;
        return view('admin.faculty.index',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streams = Stream::all();
        return view('admin.faculty.create',compact('streams'));
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
            "stream_id" => "required",
            "fac_name" => "required|alpha",
            "email" => "required",
            "password" => "required",
            "address" => "required",
            "birth_date" => "required",
            "joining_date" => "required",
            "contact_no" => "required|numeric",
            "salary" => "required|numeric",
            "image" => "required"
        ],[
            "stream_id.required" => "Please Select Stream",
            "fac_name.required" => "Please Enter Faculty Name",
            "email.required" => "Please Enter Email",
            "password.required" => "Please Enter Password",
            "address.required" => "Please Enter Address",
            "birth_date.required" => "Please Select Birth Date",
            "joining_date.required" => "Please Select Join Date",
            "contact_no.required" => "Please Enter Contact Number",
            "contact_no.numeric" => "Contact Number Must Be Numeric",
            "salary.required" => "Please Enter Salary",
            "salary.numeric" => "Salary Must Be Numeric",
            "image.required" => "Please Select Profile"
        ]);


        DB::beginTransaction(); 

        try{
            $request->validate([
                'email' => "email|unique:users"
            ]);
            $facultyRole = Role::where('name',"Faculty")->first();

            $user = new User();
            $user->name = $request->fac_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->attach($facultyRole);

            
            $faculty = new Faculty();
            $faculty->stream_id = $request->stream_id;
            $faculty->fac_name = $request->fac_name;
            $faculty->email = $request->email;
            $faculty->address = $request->address;
            $faculty->birth_date = $request->birth_date;
            $faculty->joining_date = $request->joining_date;
            $faculty->contact_no = $request->contact_no;
            $faculty->salary = $request->salary;
            if ($request->hasFile('image')) {
                $faculty->image = basename($request->file('image')->store('public'));
            }
            $faculty->save();
            DB::commit();
            
        }catch(\Exception $ex){
            echo $ex->getMessage();
            return redirect('admin/faculty')->with("msg" ,$ex->getMessage());
        }
        
        return redirect('admin/faculty')->with("msg","Faculty Added");
        
        // print_r($faculty->toarray());
        // die;
        

        
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
        
        $faculty = Faculty::find($id);
        $streams = Stream::all();
        // echo "<pre>";
        // print_r($faculty->toarray());
        // die;
        return view('admin.faculty.edit',compact('faculty','streams'));
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
            "fac_name" => "required|alpha",
            "email" => "required",
            "password" => "required",
            "address" => "required",
            "birth_date" => "required",
            "joining_date" => "required",
            "contact_no" => "required|numeric",
            "salary" => "required|numeric",
            "image" => "required"
        ],[
            "stream_id.required" => "Please Select Stream",
            "fac_name.required" => "Please Enter Faculty Name",
            "email.required" => "Please Enter Email",
            "password.required" => "Please Enter Password",
            "address.required" => "Please Enter Address",
            "birth_date.required" => "Please Select Birth Date",
            "joining_date.required" => "Please Select Join Date",
            "contact_no.required" => "Please Enter Contact Number",
            "contact_no.numeric" => "Contact Number Must Be Numeric",
            "salary.required" => "Please Enter Salary",
            "salary.numeric" => "Salary Must Be Numeric",
            "image.required" => "Please Select Profile"
        ]);

        // echo "<pre>";
        // print_r($request->toarray());
        // die;
        $faculty = Faculty::find($id);
        $faculty->stream_id = $request->stream_id;
        $faculty->fac_name = $request->fac_name;
        $faculty->email = $request->email;
        $faculty->password = $request->password;
        $faculty->address = $request->address;
        $faculty->birth_date = $request->birth_date;
        $faculty->joining_date = $request->joining_date;
        $faculty->contact_no = $request->contact_no;
        $faculty->salary = $request->salary;
        if ($request->hasFile('image')) {
            $faculty->image = basename($request->file('image')->store('public'));
        }
        $faculty->save();

        return redirect('admin/faculty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::destroy($id);
        return redirect('admin/faculty');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Active':
                Faculty::whereIn('id',$ids)
                ->update(['status'=>1]);
                break;
            case 'Deactive':
                Faculty::whereIn('id',$ids)
                ->update(['status'=>0]);
                break;
            case 'Delete':
                Faculty::destroy($ids);
                break;
        }
    }
}
