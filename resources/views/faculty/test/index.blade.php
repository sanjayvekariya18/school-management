@extends('layouts.faculty_master')

@section('custom_css')
<!--sweetalert css-->
<link href="{{asset('assets/dist/css/sweetalert/sweetalert.css')}}" rel="stylesheet">
<!-- bootstrap4 css-->
<link href="{{asset('assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

<!--custom css-->
<link href="{{asset('assets/css/custom_style.css')}}" rel="stylesheet">
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
                        <h4 class="text-themecolor">Datatable</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">MCQ-QUESTION</li>
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
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <!-- Preloader - style you can find in spinners.css -->
                                <!-- ============================================================== -->
                                <div class="preloader">
                                    <div class="loader">
                                        <div class="loader__figure"></div>
                                        <p class="loader__label">Elite faculty</p>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <h4 class="card-title">Test Detail</h4>
                                <h6 class="card-subtitle">Test Details Of Student</h6>
                                <div class="table-responsive table-body">
                                    <!--buttons_start-->
                                    <div class="col-md-12">
                                        <a href="{{url('faculty/test/create')}}" class="btn btn-info "><i class="fa fa-align-center"></i>&nbsp;&nbsp;Add Test</a>
                                        <button type="button" class="btn btn-danger action" value="Delete"><i class="fa fa-minus-circle"></i>&nbsp;&nbsp;Delete</button>
                                    </div>
                                    <!--buttons_end-->
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="checkAll" />
                                                </th>
                                                <th>Id</th>
                                                <th>Subject Name</th>
                                                <th>Semester Number</th>
                                                <th>Faculty Name</th>
                                                <th>Test Name</th>
                                                <th>Description</th>
                                                <th>No Of Question</th>
                                                <th>Total Mark</th>
                                                <th>Passing Mark</th>
                                                <th>Time Duration</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="checkAll1" />
                                                </th>
                                                <th>Id</th>
                                                <th>Subject Name</th>
                                                <th>Semester Number</th>
                                                <th>Faculty Name</th>
                                                <th>Test Name</th>
                                                <th>Description</th>
                                                <th>No Of Question</th>
                                                <th>Total Mark</th>
                                                <th>Passing Mark</th>
                                                <th>Time Duration</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($tests as $test)
                                            <tr>
                                                <td><input type="checkbox" value="{{$test->id}}" name="id[]" class="check"/></td>
                                                <td>{{$test->id}}</td>
                                                <td>{{$test->subject->sub_name}}</td>
                                                <td>{{$test->semester->sem_name}}</td>
                                                <td>{{$test->faculty->fac_name}}</td>
                                                <td>{{$test->test_name}}</td>
                                                <td>{{$test->description}}</td>
                                                <td>{{$test->no_of_ques}}</td>
                                                <td>{{$test->total_mark}}</td>
                                                <td>{{$test->pass_mark}}</td>
                                                <td>{{$test->test_duration}}</td>
                                                <td>
                                                    <a href="{{url('faculty/test/'.$test->id.'/edit')}}" class="btn btn-circle btn-lg btn-success icon-size">
                                                         <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    <span>
                                                    <form class="deleteForm" style="display:inline-block;" action="{{url('faculty/test/'.$test->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                        <button class="btn btn-circle btn-lg btn-danger icon-size deleteBtn"  type="button"> 
                                                            <i class="fa fa-trash-o " aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/2.jpg')}}" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/3.jpg')}}" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/4.jpg')}}" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/5.jpg')}}" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/6.jpg')}}" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/7.jpg')}}" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('assets/images/users/8.jpg')}}" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
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
 <!-- This is data table -->
 <script src="{{asset('assets/node_modules/datatables/datatables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<!-- <script src="{{asset('assets/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
<script src="{{asset('assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js')}}"></script> -->
<!-- end - This is for export functionality only -->
<!--sweetalert js-->
<script src="{{asset('assets/dist/css/sweetalert/sweetalert.min.js')}}"></script>

@endsection


@section('custom_javascript')
<script>
    // $(function() {
    //     $('#myTable').DataTable();
    //     $(function() {
    //         var table = $('#example').DataTable({
    //             "columnDefs": [{
    //                 "visible": false,
    //                 "targets": 2
    //             }],
    //             "order": [
    //                 [2, 'asc']
    //             ],
    //             "displayLength": 25,
    //             "drawCallback": function(settings) {
    //                 var api = this.api();
    //                 var rows = api.rows({
    //                     page: 'current'
    //                 }).nodes();
    //                 var last = null;
    //                 api.column(2, {
    //                     page: 'current'
    //                 }).data().each(function(group, i) {
    //                     if (last !== group) {
    //                         $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
    //                         last = group;
    //                     }
    //                 });
    //             }
    //         });
    //         // Order by the grouping
    //         $('#example tbody').on('click', 'tr.group', function() {
    //             var currentOrder = table.order()[0];
    //             if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
    //                 table.order([2, 'desc']).draw();
    //             } else {
    //                 table.order([2, 'asc']).draw();
    //             }
    //         });
    //     });
    // });
    
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    $(document).ready(function(){

        $('#checkAll').change(function(){
            console.log($(this).is(':checked'));
            if($(this).is(':checked')){
                $('#example23 tbody .check').prop('checked',true);
            }else{
                $('#example23 tbody .check').prop('checked',false);
            }
        
        });
    });



    // single delete pop-up

    $(document).on('click','.deleteBtn',function(e){
        $form =$(this).parent('form');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            setTimeout(function(){
                $form.submit();
            },1000);
        });
    });


    // checked checkbox
    $(document).ready(function(){

        $('#checkAll1').change(function(){
            console.log($(this).is(':checked'));
            if($(this).is(':checked')){
                $('#example23 tbody .check').prop('checked',true);
            }else{
                $('#example23 tbody .check').prop('checked',false);
            }
        });


        $(document).on('click','.action',function(){
            console.log("called");
            var act = $(this).val();
            // var flag = FALSE;
            if(!$('#example23 tbody .check:checked').length){
                alert("Please select at least one record...");
                return false;
            }

        // delete record
            if(act == "Delete"){
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {
                    action(act);
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                });
            }else{
                action(act);
            }
            return false;
            
        });

        function action(action){
            $('.loader').show();
            var tests = [];
            $('#example23 tbody .check:checked').each(function(){
                tests.push($(this).val());
            });

            $.ajax({
                type: 'POST',
                data:{ids:tests.join(','),action:action},
                url: '{{url("faculty/test/action")}}',
                success:function(response){
                    $('.table-body').load(document.URL+" .table-body");
                    // refresh functions
                    setTimeout(function(){
                        $('#example23').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        });
                        $('.loader').hide();
                    },1000);
                    
                }
            });
        }
    });

    </script>
@endsection







