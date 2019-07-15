@extends('layouts.faculty_master')

@section('custom_css')
<!-- page css -->
<link href="{{asset('assets/dist/css/pages/file-upload.css')}}" rel="stylesheet">
<link href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<!--custom css-->
<link href="{{asset('assets/css/custom_style.css')}}" rel="stylesheet" type="text/css">

@endsection


@section('content')
  <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Form Layout</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Form Layout</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="m-b-0 text-white">Student Registration</h4>
                                </div>
                                <div class="card-body">
                                <form  method="post" action="{{url('faculty/student/'.$student->id)}}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                            <div class="form-group">
                                            <div class="form-group">
                                                    <div class="txt_border">
                                                        <label for="faculty_id">Select Faculty</label>
                                                        <select class="form-control" name="faculty_id" id="name">
                                                        <option value="">SELECT</option>
                                                            @foreach($faculties as $faculty)
                                                            @if($faculty->id == $student->faculty_id)
                                                                <option value="{{$faculty->id}}" selected>
                                                                    {{$faculty->fac_name}}
                                                                </option>
                                                            @else
                                                                <option value="{{$faculty->id}}">
                                                                    {{$faculty->fac_name}}
                                                                </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">{{$errors->first('faculty_id')}}</span>
                                                </div>
                                            </div>
                                                <div class="form-group {{($errors->has('enroll_no')) ? 'has-danger' : ''}}">
                                                    <label for="enroll_no" >Enrollment Number:</label>
                                                    <input type="text" name="enroll_no" value="{{$student->enroll_no}}" id="enroll_no" class="form-control txt_border" placeholder="Enter Enrollment Number">
                                                    <span class="text-danger">{{$errors->first('enroll_no')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('firstname')) ? 'has-danger' : ''}}">
                                                    <label for="firstname" >First Name:</label>
                                                    <input type="text" name="firstname" value="{{$student->firstname}}" id="firstname" class="form-control txt_border" placeholder="Enter First Name">
                                                    <span class="text-danger">{{$errors->first('firstname')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('middlename')) ? 'has-danger' : ''}}">
                                                    <label for="middlename" >Middle Name:</label>
                                                    <input type="type" name="middlename" value="{{$student->middlename}}" id="middlename" class="form-control txt_border" placeholder="Enter Middle Name">
                                                    <span class="text-danger">{{$errors->first('middlename')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('lastname')) ? 'has-danger' : ''}}">
                                                    <label for="lastname" >Last Name:</label>
                                                    <input type="text" name="lastname" value="{{$student->lastname}}" id="lastname" class="form-control txt_border" placeholder="Enter Last Name">
                                                    <span class="text-danger">{{$errors->first('lastname')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('address')) ? 'has-danger' : ''}}">
                                                    <label for="address" >Address:</label>
                                                    <textarea name="address"  id="address" rows="5" class="form-control txt_border" placeholder="Enter Address">{{$student->address}}</textarea>
                                                    <span class="text-danger">{{$errors->first('address')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('city')) ? 'has-danger' : ''}}">
                                                    <label for="city" >City:</label>
                                                    <input type="text" name="city" value="{{$student->city}}" id="city" class="form-control txt_border" placeholder="Enter City">
                                                    <span class="text-danger">{{$errors->first('city')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('gender')) ? 'has-danger' : ''}}">
                                                    <label for="gender" class="control-label">Gender</label>
                                                    <div class="txt_border">
                                                        <select class="form-control" name="gender" > 
                                                            <option value="">SELECT</option>
                                                            <option value="Male" {{($student->gender == "Male") ? "selected" : "" }}>Male</option>
                                                            <option value="Female" {{($student->gender == "Female") ? "selected" : "" }}>Female</option>
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">{{$errors->first('gender')}}</span> 
                                                </div>
                                                <div class="form-group {{($errors->has('pincode')) ? 'has-danger' : ''}}">
                                                    <label for="pincode" >Pincode:</label>
                                                    <input type="text" name="pincode" value="{{$student->pincode}}" id="pincode" class="form-control txt_border" placeholder="Enter Pincode Number">
                                                    <span class="text-danger">{{$errors->first('pincode')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('phone_no')) ? 'has-danger' : ''}}">
                                                    <label for="phone_no" >Contact Number:</label>
                                                    <input type="text" name="phone_no" value="{{$student->phone_no}}"" id="phone_no" class="form-control txt_border" placeholder="Enter Phone Number">
                                                    <span class="text-danger">{{$errors->first('phone_no')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('dob')) ? 'has-danger' : ''}}">
                                                    <label for="dob" >Date Of Birth:</label>
                                                    <input type="date" name="dob" value="{{$student->dob}}" id="dob" class="form-control txt_border">
                                                    <span class="text-danger">{{$errors->first('dob')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('nationality')) ? 'has-danger' : ''}}">
                                                    <label for="nationality" >Nationality:</label>
                                                    <input type="text" name="nationality" value="{{$student->nationality}}" id="nationality" class="form-control txt_border" placeholder="Enter Nationality">
                                                    <span class="text-danger">{{$errors->first('nationality')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('cast')) ? 'has-danger' : ''}}">
                                                    <label for="cast" >Cast:</label>
                                                    <input type="text" name="cast" value="{{$student->cast}}" id="cast" class="form-control txt_border" placeholder="Enter Cast">
                                                    <span class="text-danger">{{$errors->first('cast')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('join_date')) ? 'has-danger' : ''}}">
                                                    <label for="join_date" >Join Date:</label>
                                                    <input type="date" name="join_date" value="{{$student->join_date}}" id="join_date" class="form-control txt_border">
                                                    <span class="text-danger">{{$errors->first('join_date')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('image')) ? 'has-danger' : ''}}">
                                                    <label for="image" >Profile:</label>
                                                        <div class="fileinput fileinput-new input-group txt_border" data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                @if(empty($student->image))
                                                                <span class="fileinput-filename"></span>
                                                                @else
                                                                <span class="fileinput-filename">{{$student->image}}</span>
                                                                @endif
                                                            </div>
                                                            <span class="input-group-append btn btn-default btn-file"> 
                                                            <span class="fileinput-new">Select file</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="image" value="{{$student->image}}">
                                                            </span>
                                                            <a href="javascript:void(0)" class="input-group-append btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('aadhar_no')) ? 'has-danger' : ''}}">
                                                    <label for="aadhar_no" >Aadhar Card Number:</label>
                                                    <input type="text" name="aadhar_no" value="{{$student->aadhar_no}}" id="aadhar_no" class="form-control txt_border" placeholder="Enter Aadhar Card Number">
                                                    <span class="text-danger">{{$errors->first('aadhar_no')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('email')) ? 'has-danger' : ''}}">
                                                    <label for="email" >Email:</label>
                                                    <input type="email" name="email" value="{{$student->email}}" id="email" class="form-control txt_border" placeholder="Enter Email">
                                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('password')) ? 'has-danger' : ''}}">
                                                    <label for="dob" >Password:</label>
                                                    <input type="password" name="password" value="{{$student->password}}" id="password" class="form-control txt_border" placeholder="Enter Password">
                                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                                </div>
                                                <div class="form-group {{($errors->has('confirm_password')) ? 'has-danger' : ''}}">
                                                    <label for="confirm_password" >Re-Enter Password:</label>
                                                    <input type="password" name="confirm_password" value="{{$student->confirm_password}}" id="confirm_password" class="form-control txt_border" placeholder="Enter Confirm Password">
                                                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                                </div>                                    
                                                
                                                
                                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                                <a href="{{url('faculty/student')}}" type="submit" class="btn btn-danger border-danger">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
@endsection

@section('custom_js')
<!--Custom JavaScript -->
<script src="{{asset('assets/dist/js/pages/jasny-bootstrap.js')}}"></script>
<script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
@endsection
@section('custom_javascript')
<script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>
@endsection