@extends('layouts.faculty_master')

@section('custom_css')
<!-- page css -->
<link href="{{asset('dist/css/pages/file-upload.css')}}" rel="stylesheet">
@endsection

@section('content')
 <!-- ============================================================== -->
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
                        <h4 class="text-themecolor">Online Test Form</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Online Test Form</li>
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
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Online Test Form</h3>
                            <p class="text-muted m-b-30 font-13">Online Test Form Of Student </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form  method="post" action="{{url('faculty/test')}}">
                                    @csrf
                                    <div class="form-group">
                                    <div class="form-group">
                                            <div class="txt_border">    
                                                <label for="subject_id">Select Subject</label>
                                                <select class="form-control" name="subject_id" id="subject_id">
                                                    <option value="">SELECT</option>
                                                    @foreach($subjects as $subject)
                                                    @if(old('subject_id') == $subject->id)
                                                        <option value="{{$subject->id}}" selected>
                                                            {{$subject->sub_name}}
                                                        </option>
                                                    @else
                                                        <option value="{{$subject->id}}">
                                                            {{$subject->sub_name}}
                                                        </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger">{{$errors->first('subject_id')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <div class="txt_border">
                                                <label for="semester_id">Select Semester</label>
                                                <select class="form-control" name="semester_id" id="semester_id">
                                                    <option value="">SELECT</option>
                                                    @foreach($semesters as $semester)
                                                    @if(old('semester_id') == $semester->id)
                                                        <option value="{{$semester->id}}" selected>
                                                            {{$semester->sem_name}}
                                                        </option>
                                                    @else
                                                        <option value="{{$semester->id}}">
                                                            {{$semester->sem_name}}
                                                        </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger">{{$errors->first('semester_id')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <div class="txt_border">
                                                <label for="faculty_id">Select Faculty</label>
                                                <select class="form-control" name="faculty_id" id="faculty_id">
                                                    <option value="">SELECT</option>
                                                    @foreach($faculties as $faculty)
                                                    @if(old('faculty_id') == $faculty->id)
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
                                    <div class="form-group {{($errors->has('test_name')) ? 'has-danger' : ''}}">
                                        <label for="test_name" >Test Name:</label>
                                        <input type="text" name="test_name" value="{{old('test_name')}}" id="test_name" class="form-control txt_border" placeholder="Enter Test Name">
                                        <span class="text-danger">{{$errors->first('test_name')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('description')) ? 'has-danger' : ''}}">
                                        <label for="description" >Test Description:</label>
                                        <input type="text" name="description" value="{{old('description')}}" id="para_description" class="form-control txt_border" placeholder="Enter Description">
                                        <span class="text-danger">{{$errors->first('description')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('no_of_ques')) ? 'has-danger' : ''}}">
                                        <label for="no_of_ques" >No Of Questions:</label>
                                        <input type="text" name="no_of_ques" id="no_of_ques" value="{{old('no_of_ques')}}" class="form-control txt_border" placeholder="Enter No Of Question">
                                        <span class="text-danger">{{$errors->first('no_of_ques')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('total_mark')) ? 'has-danger' : ''}}">
                                        <label for="total_mark" >Total Mark:</label>
                                        <input type="text" name="total_mark" id="total_mark" value="{{old('total_mark')}}" class="form-control txt_border" placeholder="Enter Total Marks">
                                        <span class="text-danger">{{$errors->first('total_mark')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('pass_mark')) ? 'has-danger' : ''}}">
                                        <label for="pass_mark" >Passing Mark:</label>
                                        <input type="text" name="pass_mark" id="pass_mark" value="{{old('pass_mark')}}" class="form-control txt_border" placeholder="Enter Passing Mark ">
                                        <span class="text-danger">{{$errors->first('pass_mark')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('test_duration')) ? 'has-danger' : ''}}">
                                        <label for="test_duration" >Test Duration:</label>
                                        <input type="text" name="test_duration"  id="test_duration" value="{{old('test_duration')}}" class="form-control txt_border" placeholder="Enter Test Duration">
                                        <span class="text-danger">{{$errors->first('test_duration')}}</span>
                                    </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="{{url('faculty/test')}}" type="submit" class="btn btn-white text-black border-0">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
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
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/dist/js/pages/jasny-bootstrap.js')}}"></script>
@endsection