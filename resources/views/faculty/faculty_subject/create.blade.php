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
                                <li class="breadcrumb-item active">Basic Form</li>
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
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Faculty Subject Form</h3>
                            <p class="text-muted m-b-30 font-13"> Form Of Faculty Subject </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form  method="post" action="{{url('faculty/faculty_subject')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                    <div class="form-group">
                                            <div class="txt_border">
                                                <label for="fac_name">Select Faculty</label>
                                                <select class="form-control" name="faculty_id" id="name">
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
                                        <div class="form-group">
                                            <div class="txt_border">
                                                <label for="stream_name">Select Stream</label>
                                                <select class="form-control" name="stream_id" id="name">
                                                    <option value="">SELECT</option>
                                                    @foreach($streams as $stream)
                                                    @if(old('stream_id') == $stream->id)
                                                        <option value="{{$stream->id}}" selected>
                                                            {{$stream->stream_name}}
                                                        </option>
                                                    @else
                                                        <option value="{{$stream->id}}">
                                                            {{$stream->stream_name}}
                                                        </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger">{{$errors->first('stream_id')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <div class="txt_border">
                                                <label for="sem_name">Select Semester</label>
                                                <select class="form-control" name="semester_id" id="name">
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
                                                <label for="divison_name">Select Divison</label>
                                                <select class="form-control" name="divison_id" id="name">
                                                    <option value="">SELECT</option>
                                                    @foreach($divisons as $divison)
                                                    @if(old('divison_id') == $divison->id)
                                                        <option value="{{$divison->id}}" selected>
                                                            {{$divison->divison_name}}
                                                        </option>
                                                    @else
                                                        <option value="{{$divison->id}}">
                                                            {{$divison->divison_name}}
                                                        </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger">{{$errors->first('divison_id')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <div class="txt_border">
                                                <label for="sub_name">Select Subject</label>
                                                <select class="form-control" name="subject_id" id="name">
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
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="{{url('faculty/faculty_subject')}}" type="submit" class="btn btn-danger border-danger">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
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