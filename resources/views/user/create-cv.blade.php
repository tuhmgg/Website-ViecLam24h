<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CV Creator - Create professional resumes easily">
    <meta name="author" content="TIM">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>Trình tạo CV</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    
    <!-- Datepicker CSS -->
    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }
        
        .cv-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 2rem;
            position: relative;
        }
        
        .cv-preview {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .cv-sidebar {
            width: 207px;
            height: 842px;
            background-color: #fbf0d5;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
        }
        
        .cv-main {
            width: 388px;
            height: 842px;
            background-color: white;
            position: absolute;
            right: 0;
            top: 0;
            padding: 31px;
        }
        
        .cv-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 20px;
            background-color: #720000;
        }
        
        .cv-avatar {
            width: 139px;
            height: 139px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin: 0 auto 20px;
            display: block;
        }
        
        .cv-divider {
            height: 2px;
            background-color: #0C3149;
            width: 139px;
            margin: 15px auto;
        }
        
        .cv-section {
            margin-bottom: 30px;
        }
        
        .cv-section-title {
            font-weight: bold;
            font-size: 25px;
            font-family: 'Inter', sans-serif;
            color: #0C3149;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .cv-section-title i {
            margin-right: 15px;
        }
        
        .cv-section-title::after {
            content: "";
            flex-grow: 1;
            height: 2px;
            background-color: #0C3149;
            margin-left: 15px;
        }
        
        .cv-form-control {
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            width: 100%;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .cv-form-control:focus {
            border-color: #bac8f3;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .cv-textarea {
            resize: none;
            height: 100px;
        }
        
        .cv-form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #4e73df;
        }
        
        .cv-actions {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        
        .cv-contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .cv-contact-item i {
            width: 30px;
            color: #0C3149;
        }
        
        .cv-contact-input {
            border: none;
            border-bottom: 1px solid #0C3149;
            background-color: transparent;
            color: #0C3149;
            font-size: 12px;
            font-weight: 600;
            width: calc(100% - 30px);
            padding: 5px 0;
        }
        
        .cv-contact-input:focus {
            outline: none;
            border-bottom: 2px solid #0C3149;
        }
        
        .cv-name-input {
            border: none;
            border-bottom: 1px solid #0C3149;
            background-color: transparent;
            color: #0C3149;
            font-size: 18px;
            font-weight: 700;
            width: 100%;
            text-align: center;
            padding: 5px 0;
            margin-bottom: 15px;
        }
        
        .cv-name-input:focus {
            outline: none;
            border-bottom: 2px solid #0C3149;
        }
        
        .cv-bio-textarea {
            border: none;
            background-color: transparent;
            color: #0C3149;
            font-size: 11px;
            width: 100%;
            height: 280px;
            padding: 10px 0;
            resize: none;
        }
        
        .cv-bio-textarea:focus {
            outline: none;
        }
        
        .cv-section-content {
            font-size: 9.8pt;
            color: #0C3149;
            margin-bottom: 20px;
        }
        
        .cv-input-sm {
            border: none;
            border-bottom: 1px solid #0C3149;
            background-color: transparent;
            color: #0C3149;
            font-size: 9.8pt;
            font-weight: 700;
            width: 100%;
            padding: 3px 0;
            margin-bottom: 5px;
        }
        
        .cv-input-sm:focus {
            outline: none;
            border-bottom: 2px solid #0C3149;
        }
        
        .cv-textarea-sm {
            border: none;
            background-color: transparent;
            color: #0C3149;
            font-size: 9.8pt;
            width: 100%;
            height: 60px;
            padding: 3px 0;
            resize: none;
            margin-bottom: 10px;
        }
        
        .cv-textarea-sm:focus {
            outline: none;
        }
        
        .file-upload {
            position: relative;
            overflow: hidden;
            margin: 10px 0;
            text-align: center;
        }
        
        .file-upload input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: pointer;
            display: block;
        }
        
        .file-upload-btn {
            border: none;
            color: #fff;
            background: #0C3149;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
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
            background: rgba(78, 115, 223, 0.5);
            line-height: 46px;
            border-radius: 50%;
            transition: all 0.3s;
        }
        
        .scroll-to-top:hover {
            background-color: #4e73df;
        }
        
        .scroll-to-top.show {
            display: block;
        }
        
        @media (max-width: 767.98px) {
            .cv-preview {
                transform: scale(0.8);
                transform-origin: top center;
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
            <div class="container-fluid py-4">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Trình tạo CV</h1>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cvTipsModal">
                            <i class="fas fa-lightbulb fa-sm text-white-50 me-1"></i> Mẹo viết CV
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Tạo CV chuyên nghiệp</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Tùy chọn:</div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-download fa-sm fa-fw me-2 text-gray-400"></i> Tải xuống mẫu</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-undo fa-sm fa-fw me-2 text-gray-400"></i> Đặt lại mẫu</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('preview.pdf')}}" method="POST" enctype="multipart/form-data" class="cv-form">
                                    @csrf
                                    @method('GET')
                                    
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="cv-container">
                                                <div class="cv-preview">
                                                    <!-- Left Sidebar -->
                                                    <div class="cv-sidebar">
                                                        <!-- Avatar Upload -->
                                                        <div class="text-center mb-4">
                                                            @if(auth()->user()->profile_pic)
                                                                <img src="{{Storage::url(auth()->user()->profile_pic)}}" class="cv-avatar" id="avatar-preview" alt="Profile Picture">
                                                            @else
                                                                <img src="{{asset('img/undraw_profile.svg')}}" class="cv-avatar" id="avatar-preview" alt="Profile Picture">
                                                            @endif
                                                            
                                                            <div class="file-upload">
                                                                <button class="file-upload-btn" type="button">Thay đổi ảnh</button>
                                                                <input type="file" name="img" class="file-upload-input" onchange="readURL(this);" accept="image/*">
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Name -->
                                                        <input name="name" type="text" class="cv-name-input" value="{{auth()->user()->name}}" placeholder="Họ và tên">
                                                        
                                                        <div class="cv-divider"></div>
                                                        
                                                        <!-- Bio -->
                                                        <textarea name="des" class="cv-bio-textarea" placeholder="Giới thiệu bản thân...">Tôi là [Tên của bạn], một người đam mê với việc tạo ra sự thay đổi tích cực thông qua công việc của mình. Với [số năm] kinh nghiệm trong ngành [ngành nghề hoặc lĩnh vực].

Sự đam mê của tôi không chỉ dừng lại ở việc xây dựng sản phẩm hay chiến lược, mà còn chạm đến việc xây dựng và phát triển mối quan hệ giữa con người.

Tôi rất mong được có cơ hội gặp gỡ và chia sẻ thêm với bạn về cách tôi có thể đóng góp vào [tên công ty hoặc ngành nghề] của bạn.</textarea>
                                                        
                                                        <div class="cv-divider"></div>
                                                        
                                                        <!-- Contact Info -->
                                                        <div class="cv-contact-item">
                                                            <i class="fa-solid fa-phone fa-lg"></i>
                                                            <input name="phone" class="cv-contact-input" value="097.643.9319" placeholder="Số điện thoại">
                                                        </div>
                                                        
                                                        <div class="cv-contact-item">
                                                            <i class="fa-solid fa-envelope fa-lg"></i>
                                                            <input name="mail" class="cv-contact-input" value="phamloc@gmail.com" placeholder="Email">
                                                        </div>
                                                        
                                                        <div class="cv-contact-item">
                                                            <i class="fa-brands fa-facebook fa-lg"></i>
                                                            <input name="social" class="cv-contact-input" value="fb.phamloc" placeholder="Facebook/LinkedIn">
                                                        </div>
                                                        
                                                        <div class="cv-contact-item">
                                                            <i class="fa-solid fa-map-marker-alt fa-lg"></i>
                                                            <input name="address" class="cv-contact-input" value="Hà Nội" placeholder="Địa chỉ">
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Right Content -->
                                                    <div class="cv-main">
                                                        <!-- Education -->
                                                        <div class="cv-section">
                                                            <div class="cv-section-title">
                                                                <i class="fa-solid fa-graduation-cap fa-xl"></i>
                                                                Học Vấn
                                                            </div>
                                                            
                                                            <div class="cv-section-content">
                                                                <input name="school-1" class="cv-input-sm" value="Tốt Nghiệp PTIT" placeholder="Trường/Bằng cấp 1">
                                                                <textarea name="des-school-1" class="cv-textarea-sm" placeholder="Mô tả chi tiết..."> - Học Viện Công Nghệ Bưu Chính Viễn Thông</textarea>
                                                                
                                                                <input name="school-2" class="cv-input-sm" value="Tốt Nghiệp PTIT" placeholder="Trường/Bằng cấp 2">
                                                                <textarea name="des-school-2" class="cv-textarea-sm" placeholder="Mô tả chi tiết...">- Học Viện Công Nghệ Bưu Chính Viễn Thông</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Experience -->
                                                        <div class="cv-section">
                                                            <div class="cv-section-title">
                                                                <i class="fa-solid fa-briefcase fa-xl"></i>
                                                                Kinh Nghiệm
                                                            </div>
                                                            
                                                            <div class="cv-section-content">
                                                                <input name="company-name-1" class="cv-input-sm" value="DEF Tech Solutions" placeholder="Tên công ty 1">
                                                                <input name="position-1" class="cv-input-sm" value="Vị trí: Kỹ sư phần mềm" placeholder="Vị trí công việc">
                                                                <textarea name="pos-des-1" class="cv-textarea-sm" placeholder="Mô tả công việc...">- Phát triển ứng dụng web và mobile: Tham gia vào quá trình phát triển từ việc lập kế hoạch, thiết kế, triển khai đến duy trì và nâng cấp các ứng dụng web và di động sử dụng các ngôn ngữ như JavaScript, ReactJS, React Native và Node.js.</textarea>
                                                                
                                                                <input name="company-name-2" class="cv-input-sm" value="GHI Solutions" placeholder="Tên công ty 2">
                                                                <input name="position-2" class="cv-input-sm" value="Vị trí: Quản lý Dự án IT" placeholder="Vị trí công việc">
                                                                <textarea name="pos-des-2" class="cv-textarea-sm" placeholder="Mô tả công việc...">- Quản lý Dự án và Tài nguyên: Đảm bảo tiến độ dự án, phân chia và quản lý tài nguyên, điều chỉnh kế hoạch dự án.</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Skills -->
                                                        <div class="cv-section">
                                                            <div class="cv-section-title">
                                                                <i class="fa-solid fa-bolt fa-xl"></i>
                                                                Kỹ Năng
                                                            </div>
                                                            
                                                            <div class="cv-section-content">
                                                                <input name="skill-1" class="cv-input-sm" value="Kỹ năng quản lý thời gian" placeholder="Kỹ năng 1">
                                                                <input name="skill-2" class="cv-input-sm" value="Kỹ năng làm việc theo nhóm" placeholder="Kỹ năng 2">
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Achievements -->
                                                        <div class="cv-section">
                                                            <div class="cv-section-title">
                                                                <i class="fa-solid fa-award fa-xl"></i>
                                                                Thành Tựu
                                                            </div>
                                                            
                                                            <div class="cv-section-content">
                                                                <input name="certificate" class="cv-input-sm" value="Đạt 9.0 Ielts" placeholder="Chứng chỉ/Giải thưởng">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Footer -->
                                                    <div class="cv-footer"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="cv-actions">
                                                <button type="submit" class="btn btn-success btn-lg">
                                                    <i class="fas fa-file-pdf me-2"></i>Tạo PDF
                                                </button>
                                                <button type="button" class="btn btn-primary btn-lg">
                                                    <i class="fas fa-save me-2"></i>Lưu mẫu
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

<!-- CV Tips Modal -->
<div class="modal fade" id="cvTipsModal" tabindex="-1" aria-labelledby="cvTipsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cvTipsModalLabel">Mẹo viết CV hiệu quả</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-check-circle text-success me-2"></i>Nên làm</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Sử dụng ngôn ngữ rõ ràng, súc tích</li>
                                    <li class="list-group-item">Nhấn mạnh thành tích và kỹ năng liên quan</li>
                                    <li class="list-group-item">Tùy chỉnh CV cho từng vị trí ứng tuyển</li>
                                    <li class="list-group-item">Sử dụng các từ khóa trong ngành</li>
                                    <li class="list-group-item">Kiểm tra lỗi chính tả và ngữ pháp</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-times-circle text-danger me-2"></i>Không nên làm</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Sử dụng font chữ khó đọc hoặc quá nhiều màu sắc</li>
                                    <li class="list-group-item">Liệt kê tất cả kinh nghiệm không liên quan</li>
                                    <li class="list-group-item">Viết quá dài (giữ CV trong khoảng 1-2 trang)</li>
                                    <li class="list-group-item">Cung cấp thông tin cá nhân không cần thiết</li>
                                    <li class="list-group-item">Sử dụng cùng một CV cho mọi vị trí ứng tuyển</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

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
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->    
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<!-- Datepicker JS -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Initialize Summernote
        $('#summernote').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol']],
                ['insert', ['link']]
            ]
        });
        
        // Initialize Datepicker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
        
        // Show/hide scroll to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-to-top').addClass('show');
            } else {
                $('.scroll-to-top').removeClass('show');
            }
        });
        
        // Smooth scroll to top
        $('.scroll-to-top').click(function() {
            $('html, body').animate({scrollTop: 0}, 300);
            return false;
        });
    });
    
    // Image preview function
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#avatar-preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>