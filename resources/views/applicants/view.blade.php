<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>Ứng viên</title> 

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    {{--    summernote--}}
    {{--    <link href="{{asset('css/summernote.min.css')}}" rel="stylesheet">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/summernote-bs4.min.css')}}">--}}
    <!-- include libraries(jQuery, bootstrap) -->
    {{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    {{--    datepicker--}}

    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.dashboard.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid py-4">
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <a href="{{ auth()->user()->user_type == 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="btn btn-secondary" style="background-color: #FBF0D5; border-color: #FBF0D5; color: #3a3b45;">
                        <i class="fas fa-arrow-left me-2"></i>Quay về Dashboard
                    </a>
                </div>
                @include('layouts.dashboard.applicantsview')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('layouts.dashboard.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
<script src="{{asset("js/demo/datatables-demo.js")}}"></script>
{{--summernote--}}
<script src="{{asset('js/summernote.min.js')}}"></script>
{{--datepicker--}}

<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('#summernote').summernote();
        $('#summernote2').summernote();
        $( "#datepicker" ).datepicker();
    });

    $(document).ready(function(){
        $('#checkbox1').change(function(){
            if(this.checked)
                $('.no').fadeIn('fast');
            else
                $('.no').fadeOut('fast');

        });
        $('#checkbox2').change(function(){
            if(this.checked)
                $('.yes').fadeIn('fast');
            else
                $('.yes').fadeOut('fast');

        });
    });
</script>

{{----}}
</body>

</html>
