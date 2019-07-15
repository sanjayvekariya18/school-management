@extends('layouts.master')

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
                        <h4 class="text-themecolor">Basic Form</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Mcq Question Form</li>
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
                            <h3 class="box-title m-b-0">Mcq Question Form</h3>
                            <p class="text-muted m-b-30 font-13"> Mcq Question Form Of Student </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form  method="post" action="{{url('admin/mcq_question')}}">
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
                                    <div class="form-group {{($errors->has('question')) ? 'has-danger' : ''}}">
                                        <label for="question" >Question:</label>
                                        <input type="text" name="question" value="{{old('question')}}" id="question" class="form-control txt_border" placeholder="Enter Question">
                                        <span class="text-danger">{{$errors->first('question')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('op1')) ? 'has-danger' : ''}}">
                                        <label for="op1" >Option 1:</label>
                                        <input type="text" name="op1" id="op1" value="{{old('op1')}}" class="form-control txt_border" placeholder="Enter Option 1">
                                        <span class="text-danger">{{$errors->first('op1')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('op2')) ? 'has-danger' : ''}}">
                                        <label for="op2" >Option 2:</label>
                                        <input type="text" name="op2" id="op2" value="{{old('op2')}}" class="form-control txt_border" placeholder="Enter Option 2">
                                        <span class="text-danger">{{$errors->first('op2')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('op3')) ? 'has-danger' : ''}}">
                                        <label for="op3" >Option 3:</label>
                                        <input type="text" name="op3" id="op3" value="{{old('op3')}}" class="form-control txt_border" placeholder="Enter Option 3">
                                        <span class="text-danger">{{$errors->first('op3')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('op4')) ? 'has-danger' : ''}}">
                                        <label for="op4" >Option 4:</label>
                                        <input type="text" name="op4" id="op4" value="{{old('op4')}}" class="form-control txt_border" placeholder="Enter Option 4">
                                        <span class="text-danger">{{$errors->first('op4')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('correct_ans')) ? 'has-danger' : ''}}">
                                        <label for="correct_ans" >Correct Answer:</label>
                                        <input type="text" name="correct_ans" id="correct_ans" value="{{old('correct_ans')}}" class="form-control txt_border" placeholder="Enter Correct Answer">
                                        <span class="text-danger">{{$errors->first('correct_ans')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('mark')) ? 'has-danger' : ''}}">
                                        <label for="mark" >Mark:</label>
                                        <input type="text" name="mark" id="mark" value="{{old('mark')}}" class="form-control txt_border" placeholder="Enter Mark ">
                                        <span class="text-danger">{{$errors->first('mark')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('negative_mark')) ? 'has-danger' : ''}}">
                                        <label for="negative_mark" >Negative Mark:</label>
                                        <input type="text" name="negative_mark" id="negative_mark" value="{{old('negative_mark')}}" class="form-control txt_border" placeholder="Enter Nagative Mark">
                                        <span class="text-danger">{{$errors->first('negative_mark')}}</span>
                                    </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="{{url('admin/mcq_question')}}" type="submit" class="btn btn-white text-black border-0">Cancel</a>
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