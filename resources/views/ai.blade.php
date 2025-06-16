<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AI Assistant for CV and email suggestions">
    <meta name="author" content="TIM">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>Trợ lý AI</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }
        
        .ai-header {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
            padding: 1.5rem;
        }
        
        .ai-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
            transition: transform 0.2s;
        }
        
        .ai-card:hover {
            transform: translateY(-5px);
        }
        
        .ai-tabs .nav-link {
            color: #5a5c69;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-radius: 10px;
            margin-right: 0.5rem;
            transition: all 0.2s;
        }
        
        .ai-tabs .nav-link:hover {
            color: #4e73df;
        }
        
        .ai-tabs .nav-link.active {
            color: #fff;
            background-color: #1cc88a;
        }
        
        .form-control {
            border-radius: 40px;
            padding: 1.5rem 1.5rem;
            height: 50px;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(28, 200, 138, 0.25);
        }
        
        .btn-success {
            background-color: #1cc88a;
            border-color: #1cc88a;
            border-radius: 40px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s;
        }
        
        .btn-success:hover {
            background-color: #17a673;
            border-color: #169b6b;
            transform: translateY(-2px);
        }
        
        .result-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .result-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .result-content {
            background-color: #f8f9fc;
            border-radius: 8px;
            padding: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        
        .tab-content {
            padding-top: 1.5rem;
        }
        
        .scroll-to-top {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            display: none;
            width: 2.75rem;
            height: 2.75rem;
            text-align: center;
            color: #fff;
            background: rgba(28, 200, 138, 0.5);
            line-height: 46px;
            border-radius: 50%;
            transition: all 0.3s;
        }
        
        .scroll-to-top:hover {
            background-color: #1cc88a;
        }
        
        .scroll-to-top.show {
            display: block;
        }
        
        @media (max-width: 767.98px) {
            .form-control {
                margin-bottom: 1rem;
            }
        }
    </style>
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
            <div class="container py-4">
                <div class="ai-header d-flex align-items-center">
                    <i class="fas fa-robot text-success me-3" style="font-size: 2rem;"></i>
                    <h1 class="mb-0">Trợ Lý AI</h1>
                </div>
                
                @if(auth()->user()->user_type == 'employee')
                    <!-- Employee Tabs -->
                    <ul class="nav nav-tabs ai-tabs mb-3" id="aiTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="cv-tab" data-bs-toggle="tab" data-bs-target="#cv" type="button" role="tab" aria-controls="cv" aria-selected="true">
                                <i class="fas fa-file-alt me-2"></i>Gợi ý CV
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab" aria-controls="email" aria-selected="false">
                                <i class="fas fa-envelope me-2"></i>Gợi ý Email
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="aiTabsContent">
                        <!-- CV Tab -->
                        <div class="tab-pane fade show active" id="cv" role="tabpanel" aria-labelledby="cv-tab">
                            <div class="ai-card p-4">
                                <h5 class="mb-3">Gợi ý nội dung CV</h5>
                                <p class="text-muted mb-4">Nhập thông tin cơ bản của bạn để nhận gợi ý về cách viết CV hiệu quả</p>
                                
                                <form action="{{route('suggest')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="cv-message" class="form-label">Thông tin của bạn:</label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input 
                                                    id="cv-message" 
                                                    type="text" 
                                                    name="cv" 
                                                    autocomplete="off" 
                                                    class="form-control shadow-sm" 
                                                    placeholder="Ví dụ: Phạm Quang Lộc, học Bưu Chính Viễn Thông từ 2019, thích chơi game, thạo photoshop, làm web laravel"
                                                >
                                            </div>
                                            <div class="col-md-2 d-grid">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-paper-plane me-2"></i>Xem Gợi Ý
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Email Tab -->
                        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                            <div class="ai-card p-4">
                                <h5 class="mb-3">Gợi ý nội dung email viết cho nhà tuyển dụng</h5>
                                <p class="text-muted mb-4">Nhập thông tin cơ bản để nhận gợi ý về cách viết email chuyên nghiệp</p>
                                
                                <form action="{{route('suggest')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email-message" class="form-label">Thông tin của bạn:</label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input 
                                                    id="email-message" 
                                                    type="text" 
                                                    name="mail" 
                                                    autocomplete="off" 
                                                    class="form-control shadow-sm" 
                                                    placeholder="Ví dụ: Phạm Quang Lộc mong muốn được hợp tác với công ty"
                                                >
                                            </div>
                                            <div class="col-md-2 d-grid">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-paper-plane me-2"></i>Xem Gợi Ý
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Employer Tabs -->
                    <ul class="nav nav-tabs ai-tabs mb-3" id="aiTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="true">
                                <i class="fas fa-file-alt me-2"></i>Gợi ý Bài Đăng
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab" aria-controls="email" aria-selected="false">
                                <i class="fas fa-envelope me-2"></i>Gợi ý Email
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="aiTabsContent">
                        <!-- Post Tab -->
                        <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
                            <div class="ai-card p-4">
                                <h5 class="mb-3">Gợi ý nội dung bài đăng tuyển dụng</h5>
                                <p class="text-muted mb-4">Nhập thông tin cơ bản về vị trí tuyển dụng để nhận gợi ý</p>
                                
                                <form action="{{route('suggest')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="post-message" class="form-label">Thông tin vị trí tuyển dụng:</label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input 
                                                    id="post-message" 
                                                    type="text" 
                                                    name="post" 
                                                    autocomplete="off" 
                                                    class="form-control shadow-sm" 
                                                    placeholder="Ví dụ: UX UI designer Thiết kế trải nghiệm người dùng và giao diện đồ họa tương tác."
                                                >
                                            </div>
                                            <div class="col-md-2 d-grid">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-paper-plane me-2"></i>Xem Gợi Ý
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Email Tab -->
                        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                            <div class="ai-card p-4">
                                <h5 class="mb-3">Gợi ý nội dung email thu hút ứng viên</h5>
                                <p class="text-muted mb-4">Nhập thông tin cơ bản để nhận gợi ý về cách viết email thu hút ứng viên</p>
                                
                                <form action="{{route('suggest')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email2-message" class="form-label">Thông tin email:</label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input 
                                                    id="email2-message" 
                                                    type="text" 
                                                    name="mail2" 
                                                    autocomplete="off" 
                                                    class="form-control shadow-sm" 
                                                    placeholder="Ví dụ: Công Ty Tim rất ấn tượng với Lộc. Bạn có thể đến công ty tôi phỏng vấn"
                                                >
                                            </div>
                                            <div class="col-md-2 d-grid">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-paper-plane me-2"></i>Xem Gợi Ý
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Results Section -->
                @if(isset($result->choices[0]->message->content))
                    <div class="result-container">
                        <div class="result-header">
                            <i class="fas fa-lightbulb text-warning me-2" style="font-size: 1.5rem;"></i>
                            <h4 class="mb-0">Kết quả gợi ý</h4>
                        </div>
                        <div class="result-content">
                            {!!$result->choices[0]->message->content!!}
                        </div>
                    </div>
                @endif
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Xác nhận đăng xuất</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn đăng xuất khỏi phiên làm việc hiện tại không?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <button class="btn btn-primary" onclick="confirmLogout()">Đăng Xuất</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden logout form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
function confirmLogout() {
    // Submit logout form
    document.getElementById('logout-form').submit();
}
</script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Show/hide scroll to top button
    window.addEventListener('scroll', function() {
        var scrollToTopButton = document.querySelector('.scroll-to-top');
        if (window.pageYOffset > 100) {
            scrollToTopButton.classList.add('show');
        } else {
            scrollToTopButton.classList.remove('show');
        }
    });
    
    // Activate tab based on form submission
    document.addEventListener('DOMContentLoaded', function() {
        // Check if there's a result and activate the appropriate tab
        @if(isset($result))
            // You can add logic here to determine which tab to activate based on the form that was submitted
            // For example, if you pass a parameter in the session to indicate which form was submitted
        @endif
    });
</script>
</body>
</html>