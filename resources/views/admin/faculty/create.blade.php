@extends('layouts.master')

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
                            <h3 class="box-title m-b-0">Faculty Form</h3>
                            <p class="text-muted m-b-30 font-13"> Form Of Faculty </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form  method="post" action="{{url('admin/faculty')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="txt_border">
                                                <label for="sem_name">Select Stream</label>
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
                                    <div class="form-group {{($errors->has('fac_name')) ? 'has-danger' : ''}}">
                                        <label for="fac_name" >Faculty Name:</label>
                                        <input type="text" name="fac_name" value="{{old('fac_name')}}" id="fac_name" class="form-control txt_border" placeholder="Enter Faculty Name">
                                        <span class="text-danger">{{$errors->first('fac_name')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('email')) ? 'has-danger' : ''}}">
                                        <label for="email" >Email:</label>
                                        <input type="text" name="email" value="{{old('email')}}" id="email" class="form-control txt_border" placeholder="Enter Faculty Email">
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('password')) ? 'has-danger' : ''}}">
                                        <label for="password" >Password:</label>
                                        <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control txt_border" placeholder="Enter Password">
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('address')) ? 'has-danger' : ''}}">
                                        <label for="address" >Address:</label>
                                        <textarea name="address" id="address" class="form-control txt_border" placeholder="Enter Address">{{old('address')}}</textarea>
                                        <span class="text-danger">{{$errors->first('address')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('birth_date')) ? 'has-danger' : ''}}">
                                        <label for="birth_date" >Birth Date:</label>
                                        <input type="date" name="birth_date" value="{{old('birth_date')}}" id="birth_date" class="form-control txt_border" placeholder="dd/mm/yyyy">
                                        <span class="text-danger">{{$errors->first('birth_date')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('joining_date')) ? 'has-danger' : ''}}">
                                        <label for="joining_date" >Join Date:</label>
                                        <input type="date" name="joining_date" value="{{old('joining_date')}}" id="joining_date" class="form-control txt_border" placeholder="dd/mm/yyyy">
                                        <span class="text-danger">{{$errors->first('joining_date')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('contact_no')) ? 'has-danger' : ''}}">
                                        <label for="contact_no" >Contact Number:</label>
                                        <input type="text" name="contact_no" value="{{old('contact_no')}}" id="contact_no" class="form-control txt_border" placeholder="Enter Contact Number">
                                        <span class="text-danger">{{$errors->first('contact_no')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('salary')) ? 'has-danger' : ''}}">
                                        <label for="salary" >Salary:</label>
                                        <input type="text" name="salary" value="{{old('salary')}}" id="salary" class="form-control txt_border" placeholder="Enter Salary">
                                        <span class="text-danger">{{$errors->first('salary')}}</span>
                                    </div>
                                    <div class="form-group {{($errors->has('image')) ? 'has-danger' : ''}}">
                                        <label for="image" >Profile:</label>
                                            <div class="fileinput fileinput-new input-group txt_border" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput">
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                    <span class="fileinput-filename"></span>
                                                </div>
                                                <span class="input-group-append btn btn-default btn-file"> 
                                                <span class="fileinput-new">Select file</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image">
                                                </span>
                                                <a href="javascript:void(0)" class="input-group-append btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                       
                                    </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="{{url('admin/faculty')}}" type="submit" class="btn btn-danger border-danger">Cancel</a>
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