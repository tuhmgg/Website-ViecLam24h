<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>Bảng điều khiển</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/unified-dashboard.css')}}" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">

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
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; top: 85px; right:24px; z-index: 1000;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session()->get('message')}}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: absolute; top: 85px; right:24px; z-index: 1000;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session()->get('error')}}
                </div>
            @endif
            
            @yield('content')
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

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>

<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- Additional Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
// Auto hide alerts after 5 seconds
$(document).ready(function() {
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
    
    // Initialize Summernote
    $('#summernote').summernote();
});
</script>

</body>
</html>
