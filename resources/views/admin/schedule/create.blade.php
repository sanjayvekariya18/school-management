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
                        <h4 class="text-themecolor">True Or False Form</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Schedule</li>
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
                            <h3 class="box-title m-b-0">Schedule Form</h3>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form  method="post" action="{{url('admin/schedule')}}">
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
                                    <div class="form-group {{($errors->has('date')) ? 'has-danger' : ''}}">
                                        <label for="date" >Schedule Date:</label>
                                        <input type="date" name="date" value="{{old('date')}}" id="date" class="form-control txt_border" placeholder="Enter Date">
                                        <span class="text-danger">{{$errors->first('date')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('start_time')) ? 'has-danger' : ''}}">
                                        <label for="start_time" >Start Time:</label>
                                        <input type="time" name="start_time" id="start_time" value="{{old('start_time')}}" class="form-control txt_border" placeholder="Fill Start Time">
                                        <span class="text-danger">{{$errors->first('start_time')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('end_time')) ? 'has-danger' : ''}}">
                                        <label for="end_time" >End Time:</label>
                                        <input type="time" name="end_time" id="end_time" value="{{old('end_time')}}" class="form-control txt_border" placeholder="Fill End Time">
                                        <span class="text-danger">{{$errors->first('end_time')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('top_scorer')) ? 'has-danger' : ''}}">
                                        <label for="top_scorer" class="control-label">Top Scorer:</label>
                                        <div class="txt_border">
                                            <select class="form-control" name="top_scorer"> 
                                                <option value="">SELECT</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <span class="text-danger">{{$errors->first('top_scorer')}}</span> 
                                    </div>
                                    <div class="form-group {{($errors->has('no_of_top_scorers')) ? 'has-danger' : ''}}">
                                        <label for="no_of_top_scorers" >Number Of Top Scorers:</label>
                                        <input type="text" name="no_of_top_scorers" id="no_of_top_scorers" value="{{old('no_of_top_scorers')}}" class="form-control txt_border" placeholder="Enter Number Of Top Scorers">
                                        <span class="text-danger">{{$errors->first('no_of_top_scorers')}}</span>
                                    </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="{{url('admin/schedule')}}" type="submit" class="btn btn-white text-black border-0">Cancel</a>
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