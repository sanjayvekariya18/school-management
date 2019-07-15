<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty\Faculty;
use App\Faculty\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('faculty.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('faculty.student.create',compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //   echo "<pre>";
        // print_r($request->toarray());
        // die;

        $request->validate([
            "faculty_id" => "required",
            "enroll_no" => "required",
            "firstname" => "required|alpha",
            "middlename" => "required|alpha",
            "lastname" => "required|alpha",
            "address" => "required",
            "city" => "required|alpha",
            "gender" => "required",
            "pincode" => "required|numeric",
            "phone_no" => "required|numeric",
            "dob" => "required",
            "nationality" => "required|alpha",
            "cast" => "required|alpha",
            "join_date" => "required",
            "image" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required",
            "aadhar_no" => "required|numeric"
        ],[
            "faculty_id.required" => "Please Select Faculty",
            "enroll_no.required" => "Please Enter Enrollment Number",
            "firstname.required" => "Please Enter First Name",
            "firstname.alpha" => "First Name Must Be Alpha",
            "middlename.required" => "Please Enter Middle Name",
            "middlename.alpha" => "Middle Name Must Be Alpha",
            "lastname.required" => "Please Enter Last Name",
            "lastname.alpha" => "Last Name Must Be Alpha",
            "address.required" => "Please Enter Address",
            "city.required" => "Please Enter City",
            "city.alpha" => "City Must Be Alpha",
            "gender.required" => "Please Select Gender",
            "pincode.required" => "Please Enter Pincode",
            "pincode.numeric" => "Pincode Must Be Numeric",
            "phone_no.required" => "Please Enter Contact Number",
            "phone_no.numeric" => "Contact Number Must Be Numeric",
            "dob.required" => "Please Select Date Of Birth",
            "nationality.required" => "Please Enter Nationality",
            "nationality.alpha" => "Nationality Must Be Alpha",
            "cast.required" => "Please Enter Cast",
            "cast.alpha" => "Cast Must Be Alpha",
            "join_date.required" => "Please Select Join Date",
            "image.required" => "Please Select Profile",
            "email.required" => "Please Enter Email",
            "password.required" => "Please Enter password",
            "confirm_password.required" => "Please Enter Confirm password",
            "aadhar_no.required" => "Please Enter Aadhar Card Number",
            "aadhar_no.numeric" => "Aadhar Card Number Must Be Numeric"
        ]);


        // DB::beginTransaction(); 

        // try{
        //     $request->validate([
        //         'email' => "email|unique:users"
        //     ]);
        //     $studentRole = Role::where('name',"Student")->first();

            // $user = new User();
            // $user->name = $request->middlename;
            // $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            // $user->save();
            // $user->roles()->attach($studentRole);

            $student = new Student();
            $student->faculty_id=$request->faculty_id;
            $student->enroll_no = $request->enroll_no;
            $student->firstname=$request->firstname;
            $student->middlename=$request->middlename;
            $student->lastname=$request->lastname;
            $student->address=$request->address;
            $student->city=$request->city;
            $student->gender=$request->gender;
            $student->pincode=$request->pincode;
            $student->phone_no=$request->phone_no;
            $student->dob=$request->dob;
            $student->nationality=$request->nationality;
            $student->cast=$request->cast;
            $student->join_date=$request->join_date;
            if ($request->hasFile('image')) {
                $student->image = basename($request->file('image')->store('public'));
            }
            $student->email=$request->email;
            $student->password=$request->password;
            $student->confirm_password=$request->confirm_password;
            $student->aadhar_no=$request->aadhar_no;

            $student->save();
        //     DB::commit();
        // }catch(\Exception $ex){
        //     echo $ex->getMessage();
        //     return redirect('admin/student')->with("msg" ,$ex->getMessage());
        // }
        
        // return redirect('admin/student')->with("msg","Student Added");
        return redirect('admin/student');
        
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
        $student = Student::find($id);
        $faculties = Faculty::all();
        // echo "<pre>";
        // print_r($student->toarray());
        // die;
        return view('faculty.student.edit',compact('student','faculties'));
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
        ///  echo "<pre>";
        // print_r($request->toarray());
        // die;

        $request->validate([
            "faculty_id" => "required",
            "enroll_no" => "required",
            "firstname" => "required|alpha",
            "middlename" => "required|alpha",
            "lastname" => "required|alpha",
            "address" => "required",
            "city" => "required|alpha",
            "gender" => "required",
            "pincode" => "required|numeric",
            "phone_no" => "required|numeric",
            "dob" => "required",
            "nationality" => "required|alpha",
            "cast" => "required|alpha",
            "join_date" => "required",
            "image" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required",
            "aadhar_no" => "required|numeric"
        ],[
            "faculty_id.required" => "Please Select Faculty",
            "enroll_no.required" => "Please Enter Enrollment Number",
            "firstname.required" => "Please Enter First Name",
            "firstname.alpha" => "First Name Must Be Alpha",
            "middlename.required" => "Please Enter Middle Name",
            "middlename.alpha" => "Middle Name Must Be Alpha",
            "lastname.required" => "Please Enter Last Name",
            "lastname.alpha" => "Last Name Must Be Alpha",
            "address.required" => "Please Enter Address",
            "city.required" => "Please Enter City",
            "city.alpha" => "City Must Be Alpha",
            "gender.required" => "Please Select Gender",
            "pincode.required" => "Please Enter Pincode",
            "pincode.numeric" => "Pincode Must Be Numeric",
            "phone_no.required" => "Please Enter Contact Number",
            "phone_no.numeric" => "Contact Number Must Be Numeric",
            "dob.required" => "Please Select Date Of Birth",
            "nationality.required" => "Please Enter Nationality",
            "nationality.alpha" => "Nationality Must Be Alpha",
            "cast.required" => "Please Enter Cast",
            "cast.alpha" => "Cast Must Be Alpha",
            "join_date.required" => "Please Select Join Date",
            "image.required" => "Please Select Profile",
            "email.required" => "Please Enter Email",
            "password.required" => "Please Enter password",
            "confirm_password.required" => "Please Enter Confirm password",
            "aadhar_no.required" => "Please Enter Aadhar Card Number",
            "aadhar_no.numeric" => "Aadhar Card Number Must Be Numeric"
        ]);




        $student = Student::find($id);
        $student->faculty_id=$request->faculty_id;
        $student->enroll_no = $request->enroll_no;
        $student->firstname=$request->firstname;
        $student->middlename=$request->middlename;
        $student->lastname=$request->lastname;
        $student->address=$request->address;
        $student->city=$request->city;
        $student->gender=$request->gender;
        $student->pincode=$request->pincode;
        $student->phone_no=$request->phone_no;
        $student->dob=$request->dob;
        $student->nationality=$request->nationality;
        $student->cast=$request->cast;
        $student->join_date=$request->join_date;
        if ($request->hasFile('image')) {
            $student->image = basename($request->file('image')->store('public'));
        }
        $student->email=$request->email;
        $student->password=$request->password;
        $student->confirm_password=$request->confirm_password;
        $student->aadhar_no=$request->aadhar_no;

        $student->save();

        return redirect('faculty/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('faculty/student');
    }
    public function action(Request $request)
    {
        
        $ids = explode(',',$request->ids);
        switch ($request->action) {
            case 'Active':
                Student::whereIn('id',$ids)
                ->update(['status'=>1]);
                break;
            case 'Deactive':
                Student::whereIn('id',$ids)
                ->update(['status'=>0]);
                break;
            case 'Delete':
                Student::destroy($ids);
                break;
        }
    }
}
