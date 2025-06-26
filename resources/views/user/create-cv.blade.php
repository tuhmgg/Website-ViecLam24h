<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CV Creator - Create professional resumes easily">
    <meta name="author" content="TIM">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>Trình tạo CV chuyên nghiệp</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/cv-builder.css')}}" rel="stylesheet">
    
    <style>
    .cv-builder-container {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        margin-top: 2rem;
    }
    .cv-form-panel {
        flex: 1 1 350px;
        max-width: 420px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        padding: 2rem 1.5rem;
        min-width: 320px;
    }
    .cv-preview-panel {
        flex: 2 1 600px;
        min-width: 350px;
        background: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        padding: 2rem 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .cv-preview {
        width: 794px;
        min-height: 1123px;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.10);
        padding: 32px 40px;
        font-family: 'Inter', 'Nunito', Arial, sans-serif;
        color: #222;
        position: relative;
        margin: 0 auto;
        display: block;
        box-sizing: border-box;
    }
    .cv-preview-row {
        display: flex;
        flex-direction: row;
        width: 100%;
        min-height: 1123px;
        background: #f4f5f7;
        border-radius: 6px;
        box-sizing: border-box;
    }
    .cv-sidebar-custom {
        background: #18344a;
        width: 250px;
        min-height: 1123px;
        padding: 40px 24px 40px 24px;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-sizing: border-box;
    }
    .cv-main-content {
        flex: 1;
        background: #fff;
        padding: 48px 48px 32px 48px;
        min-height: 1123px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        position: relative;
    }
    
    /* Sidebar styles */
    .sidebar-divider {
        width: 100%;
        height: 1px;
        background: rgba(255,255,255,0.2);
        margin: 20px 0;
    }
    .sidebar-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 15px;
        letter-spacing: 1px;
        text-align: center;
        width: 100%;
    }
    .sidebar-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        font-size: 0.85rem;
        width: 100%;
    }
    .sidebar-item i {
        margin-right: 10px;
        width: 16px;
        color: #0d6efd;
    }
    .sidebar-item span {
        flex: 1;
        word-break: break-word;
    }
    
    .cv-preview .cv-header {
        display: block;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 1.5rem;
    }
    .cv-preview .cv-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #0d6efd;
        background: #f1f3f5;
        display: block;
        margin: 0 auto 10px auto;
        float: none;
        position: static;
    }
    .cv-preview .cv-title {
        font-size: 2rem;
        font-weight: 700;
        color: #0d6efd;
        margin-bottom: 0.2rem;
        text-align: center;
        display: block;
    }
    .cv-preview .cv-subtitle {
        font-size: 1.1rem;
        color: #495057;
        margin-bottom: 0.5rem;
        text-align: center;
        display: block;
    }
    .cv-preview .cv-section {
        margin-bottom: 1.2rem;
        display: block;
    }
    .cv-preview .cv-section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 0.7rem;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 3px;
        display: block;
    }
    .cv-preview .cv-list {
        padding-left: 1.2rem;
        margin-bottom: 0;
        display: block;
    }
    .cv-preview .cv-list li {
        margin-bottom: 0.3rem;
        font-size: 1rem;
        display: list-item;
    }
    .cv-preview .cv-contact {
        font-size: 1rem;
        color: #495057;
        margin-bottom: 0.2rem;
        text-align: center;
        display: block;
    }
    .cv-preview .cv-footer {
        position: static;
        text-align: right;
        font-size: 0.95rem;
        color: #adb5bd;
        margin-top: 20px;
        display: block;
    }
    .cv-color-picker {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 50%;
        margin-left: 0.5rem;
        cursor: pointer;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    }
    .cv-builder-actions {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
        margin-bottom: 0.5rem;
    }
    .cv-builder-actions .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 140px;
        white-space: nowrap;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        font-weight: 500;
        min-height: 44px;
        padding: 0.5rem 1.2rem;
        font-size: 1rem;
    }
    .cv-builder-actions .btn i {
        margin-right: 0.5em;
        display: inline-block;
    }
    .cv-builder-actions::-webkit-scrollbar {
        height: 8px;
    }
    .cv-builder-actions::-webkit-scrollbar-thumb {
        background: #bdbdbd;
        border-radius: 4px;
    }
    .cv-builder-actions::-webkit-scrollbar-track {
        background: #f5f5f5;
    }
    .cv-builder-actions {
        /* Luôn hiển thị thanh cuộn ngang */
        overflow-x: scroll;
    }
    .cv-builder-actions .btn-save-cv {
        background: linear-gradient(45deg, #28a745, #20c997);
        color: #fff;
        border: none;
    }
    .cv-builder-actions .btn-save-cv:hover {
        background: linear-gradient(45deg, #218838, #1ea085);
        color: #fff;
        transform: translateY(-2px);
    }
    .cv-builder-actions .btn-upload-cv {
        background: linear-gradient(45deg, #007bff, #00c6ff);
        color: #fff;
        border: none;
    }
    .cv-builder-actions .btn-upload-cv:hover {
        background: linear-gradient(45deg, #0056b3, #00aaff);
        color: #fff;
        transform: translateY(-2px);
    }
    .cv-builder-actions .btn-success {
        background: linear-gradient(45deg, #ff9800, #ffc107);
        color: #fff;
        border: none;
    }
    .cv-builder-actions .btn-success:hover {
        background: linear-gradient(45deg, #ffb300, #ff9800);
        color: #fff;
        transform: translateY(-2px);
    }
    
    @media print {
        body {
            background: #fff !important;
        }
        .cv-preview {
            width: 210mm !important;
            min-width: 210mm !important;
            max-width: 210mm !important;
            min-height: 297mm !important;
            max-height: 297mm !important;
            height: 297mm !important;
            margin: 0 auto !important;
            padding: 0 !important;
            box-shadow: none !important;
            background: #fff !important;
            overflow: hidden !important;
            display: block !important;
        }
        .cv-preview *, .cv-preview-row, .cv-sidebar-custom, .cv-main-content {
            box-sizing: border-box !important;
            max-width: 100% !important;
            max-height: 100% !important;
            overflow: hidden !important;
        }
        .cv-preview-panel, .cv-builder-container, .cv-form-panel, .cv-builder-actions, .no-print, .btn, nav, footer, header, .sidebar, .topbar {
            display: none !important;
        }
    }
    .cv-avatar {
        width: 120px !important;
        height: 120px !important;
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 28px;
        background: #fff;
        object-fit: cover;
        display: block;
    }
    .cv-main-content .cv-title {
        font-size: 2.2rem;
        font-weight: 600;
        color: #222;
        margin-bottom: 0.2rem;
        letter-spacing: 1px;
    }
    .cv-main-content .cv-subtitle {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 1.5rem;
        letter-spacing: 2px;
    }
    .cv-main-content .cv-section-title {
        color: #18344a;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 3px;
        margin-bottom: 0.7rem;
        font-size: 1.1rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .cv-main-content .cv-section {
        margin-bottom: 1.2rem;
    }
    .cv-main-content .cv-list li {
        font-size: 1rem;
        margin-bottom: 0.3rem;
    }
    .cv-footer {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 32px;
        text-align: right;
        font-size: 0.95rem;
        color: #adb5bd;
        margin-top: 20px;
        display: block;
    }
    .cv-title, .cv-subtitle, .cv-section-title, .cv-section, .cv-list, .cv-list li, .cv-contact, .cv-footer, #previewName, #previewPosition, #previewAbout, #previewPhone, #previewEmail, #previewBirthday, #previewGender, #previewAddress {
        word-break: break-word;
        overflow-wrap: break-word;
        white-space: pre-line;
    }
    /* Responsive cho web */
    @media (max-width: 900px) {
        .cv-preview-row {
            flex-direction: column;
        }
        .cv-sidebar-custom {
            width: 100%;
            min-height: unset;
            padding: 24px 12px;
        }
        .cv-main-content {
            padding: 24px 12px;
        }
        .cv-preview {
            width: 100% !important;
            min-width: unset;
            min-height: unset;
            padding: 12px !important;
        }
    }
    @media (max-width: 600px) {
        .cv-preview {
            padding: 4px !important;
        }
        .cv-main-content, .cv-sidebar-custom {
            padding: 12px 4px !important;
        }
        .cv-avatar {
            width: 80px !important;
            height: 80px !important;
        }
        .cv-builder-actions {
            flex-direction: column;
            gap: 0.5rem;
            align-items: stretch;
        }
        .cv-builder-actions .btn {
            min-width: 120px;
            font-size: 0.92rem;
            padding: 0.5rem 0.8rem;
        }
        .cv-upload-row .btn-upload-cv {
            min-width: 140px;
        }
    }
    @media print {
        body > * { display: none !important; }
        #cvPreviewPanelPDF { display: block !important; }
        #cvPreviewPanelPDF {
            width: 210mm !important;
            height: 297mm !important;
            margin: 0 auto !important;
            background: #fff !important;
            box-shadow: none !important;
            padding: 0 !important;
            overflow: hidden !important;
        }
    }
    .cv-builder-actions .btn-download-pdf {
        background: linear-gradient(45deg, #6E9CBC, #3b82f6);
        color: #fff;
        border: none;
    }
    .cv-builder-actions .btn-download-pdf:hover {
        background: linear-gradient(45deg, #2563eb, #6E9CBC);
        color: #fff;
        transform: translateY(-2px);
    }
    .cv-upload-row {
        display: flex;
        justify-content: center;
        margin-top: 0.5rem;
    }
    .cv-upload-row .btn-upload-cv {
        min-width: 180px;
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
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="d-sm-flex align-items-center justify-content-end mb-4">
                    <a href="{{ auth()->user()->user_type == 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="btn btn-secondary" style="background-color: #FBF0D5; border-color: #FBF0D5; color: #3a3b45;">
                        <i class="fas fa-arrow-left me-2"></i>Quay về Dashboard
                    </a>
                </div>

                <div class="cv-builder-container">
                    <!-- Form Panel -->
                    <form id="cvForm" class="cv-form-panel" autocomplete="off" enctype="multipart/form-data">
                        <h5 class="fw-bold mb-3">Thông tin cá nhân</h5>
                        <div class="mb-3 text-center">
                            <img id="avatarPreview" src="{{ asset('img/undraw_profile.svg') }}" class="cv-avatar mb-2" alt="Avatar" style="width: 80px; height: 80px; border-radius: 50%;">
                            <input type="file" class="form-control" id="avatarInput" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="cvName" placeholder="Nhập họ và tên" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vị trí ứng tuyển</label>
                            <input type="text" class="form-control" id="cvPosition" placeholder="VD: Lập trình viên, Kế toán...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giới thiệu bản thân</label>
                            <textarea class="form-control" id="cvAbout" rows="3" placeholder="Tóm tắt về bạn, mục tiêu nghề nghiệp..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="cvPhone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="cvEmail" placeholder="Nhập email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="cvBirthday">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giới tính</label>
                            <select class="form-control" id="cvGender">
                                <option value="">Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="cvAddress" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Màu chủ đạo</label>
                            <input type="color" class="cv-color-picker" id="cvColor" value="#0d6efd">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kỹ năng</label>
                            <textarea class="form-control" id="cvSkills" rows="2" placeholder="Nhập các kỹ năng nổi bật, cách nhau bởi dấu phẩy"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sở thích</label>
                            <div id="hobbyList"></div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" onclick="addHobby()">+ Thêm sở thích</button>
                        </div>
                        <hr>
                        <h5 class="fw-bold mb-3">Học vấn</h5>
                        <div id="educationList"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="addEducation()">+ Thêm học vấn</button>
                        <hr>
                        <h5 class="fw-bold mb-3">Kinh nghiệm làm việc</h5>
                        <div id="experienceList"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" onclick="addExperience()">+ Thêm kinh nghiệm</button>
                        <hr>
                        <h5 class="fw-bold mb-3">Chứng chỉ/Giải thưởng</h5>
                        <div id="certificateList"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" onclick="addCertificate()">+ Thêm chứng chỉ</button>
                        <div class="cv-builder-actions">
                            <button type="button" class="btn btn-save-cv" onclick="saveCV()"><i class="fas fa-save"></i> Lưu CV</button>
                            <button type="button" class="btn btn-upload-cv" onclick="uploadCvToServer()"><i class="fas fa-cloud-upload-alt"></i> Tải CV lên server</button>
                            <button type="button" class="btn btn-success" onclick="printCV()"><i class="fas fa-print"></i> In CV</button>
                        </div>
                    </form>
                    <!-- Preview Panel (Web) -->
                    <div class="cv-preview-panel" id="cvPreviewPanelWeb">
                        <div class="cv-preview" id="cvPreview">
                            <div class="cv-preview-row">
                                <!-- Sidebar trái -->
                                <div class="cv-sidebar-custom">
                                    <div class="text-center mb-4">
                                        <img id="previewAvatar" src="{{ asset('img/undraw_profile.svg') }}" class="cv-avatar" alt="Avatar">
                                    </div>
                                    <div class="sidebar-divider"></div>
                                    <div class="sidebar-title">LIÊN HỆ</div>
                                    <div class="sidebar-item"><i class="fas fa-phone-alt"></i><span id="previewPhone" data-placeholder="Số điện thoại">Số điện thoại</span></div>
                                    <div class="sidebar-item"><i class="fas fa-envelope"></i><span id="previewEmail" data-placeholder="Email">Email</span></div>
                                    <div class="sidebar-item"><i class="fas fa-calendar"></i><span id="previewBirthday" data-placeholder="Ngày sinh">Ngày sinh</span></div>
                                    <div class="sidebar-item"><i class="fas fa-venus-mars"></i><span id="previewGender" data-placeholder="Giới tính">Giới tính</span></div>
                                    <div class="sidebar-item"><i class="fas fa-map-marker-alt"></i><span id="previewAddress" data-placeholder="Địa chỉ">Địa chỉ</span></div>
                                </div>
                                <!-- Main content phải -->
                                <div class="cv-main-content">
                                    <div class="cv-title" id="previewName">Họ và tên</div>
                                    <div class="cv-subtitle" id="previewPosition">Tiêu đề hồ sơ</div>
                                    <div class="cv-section">
                                        <div class="cv-section-title">Giới thiệu bản thân</div>
                                        <div id="previewAbout" style="white-space: pre-line;">Tóm tắt về bạn, mục tiêu nghề nghiệp...</div>
                                    </div>
                                    <div class="cv-section">
                                        <div class="cv-section-title">Học vấn</div>
                                        <ul class="cv-list" id="previewEducation"></ul>
                                    </div>
                                    <div class="cv-section">
                                        <div class="cv-section-title">Kinh nghiệm làm việc</div>
                                        <ul class="cv-list" id="previewExperience"></ul>
                                    </div>
                                    <div class="cv-section">
                                        <div class="cv-section-title">Kỹ năng</div>
                                        <ul id="previewSkills" class="cv-list"></ul>
                                    </div>
                                    <div class="cv-section">
                                        <div class="cv-section-title">Chứng chỉ/Giải thưởng</div>
                                        <ul class="cv-list" id="previewCertificate"></ul>
                                    </div>
                                    <div class="cv-section">
                                        <div class="cv-section-title">Sở thích</div>
                                        <ul id="previewHobbies" class="cv-list"></ul>
                                    </div>
                                    <div class="cv-footer">Tạo bởi ViecLam24h - {{ date('Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Panel (PDF only) -->
                    <div class="cv-preview-pdf" id="cvPreviewPanelPDF" style="display:none;">
                        <div style="width:210mm; height:297mm; margin:0 auto; background:#fff; box-sizing:border-box; padding:0;">
                            <div style="padding:24px 32px;">
                                <h1 id="pdfName">Họ và tên</h1>
                                <div id="pdfPosition">Tiêu đề hồ sơ</div>
                                <div id="pdfAbout">Tóm tắt về bạn, mục tiêu nghề nghiệp...</div>
                                <div id="pdfPhone">Số điện thoại</div>
                                <div id="pdfEmail">Email</div>
                                <div id="pdfBirthday">Ngày sinh</div>
                                <div id="pdfGender">Giới tính</div>
                                <div id="pdfAddress">Địa chỉ</div>
                                <div id="pdfEducation"></div>
                                <div id="pdfExperience"></div>
                                <div id="pdfSkills"></div>
                                <div id="pdfCertificate"></div>
                                <div id="pdfHobbies"></div>
                                <div style="text-align:right;color:#aaa;">Tạo bởi ViecLam24h - {{ date('Y') }}</div>
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

<!-- Bootstrap 5 Bundle JS (Popper included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function confirmLogout() {
    document.getElementById('logout-form').submit();
}

function printCV() {
    // Ẩn các thành phần không cần in
    document.querySelectorAll('.cv-builder-actions, .no-print, nav, footer, header, .sidebar, .topbar').forEach(el => {
        if (el) el.style.display = 'none';
    });
    window.print();
    // Sau khi in xong, hiển thị lại các thành phần
    setTimeout(() => {
        document.querySelectorAll('.cv-builder-actions, .no-print, nav, footer, header, .sidebar, .topbar').forEach(el => {
            if (el) el.style.display = '';
        });
    }, 1000);
}

function uploadCvToServer() {
    try {
        // Kiểm tra dữ liệu bắt buộc
        const name = document.getElementById('cvName').value.trim();
        if (!name) {
            showNotification('Vui lòng nhập họ và tên!', 'error');
            document.getElementById('cvName').focus();
            return;
        }

        // Hiển thị thông báo đang xử lý
        showNotification('Đang tải CV lên server, vui lòng chờ...', 'info');
        
        // Thu thập dữ liệu từ form
        const cvData = {
            name: name,
            position: document.getElementById('cvPosition').value,
            about: document.getElementById('cvAbout').value,
            phone: document.getElementById('cvPhone').value,
            email: document.getElementById('cvEmail').value,
            birthday: document.getElementById('cvBirthday').value,
            gender: document.getElementById('cvGender').value,
            address: document.getElementById('cvAddress').value,
            skills: document.getElementById('cvSkills').value,
            color: document.getElementById('cvColor').value,
            education: getListData('educationList', ['school', 'year']),
            experience: getListData('experienceList', ['company', 'role', 'year']),
            certificates: getListData('certificateList', ['name']),
            hobbies: getListData('hobbyList', ['name']),
            _token: '{{ csrf_token() }}'
        };

        // Gửi dữ liệu lên server
        fetch('{{ route("user.cv.upload-from-builder") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(cvData)
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Network response was not ok');
        })
        .then(data => {
            if (data.success) {
                showNotification('CV đã được tải lên thành công! Đang chuyển hướng...', 'success');
                // Chuyển hướng đến trang CV sau 2 giây
                setTimeout(() => {
                    window.location.href = '{{ route("user.cv") }}';
                }, 2000);
            } else {
                showNotification(data.message || 'Có lỗi xảy ra khi tải CV!', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Có lỗi xảy ra khi tải CV lên server!', 'error');
        });
        
    } catch (error) {
        console.error('Lỗi khi tải CV:', error);
        showNotification('Có lỗi xảy ra khi tải CV!', 'error');
    }
}

function syncDataToPDF() {
    // Đồng bộ dữ liệu từ form sang PDF
    document.getElementById('pdfName').innerText = document.getElementById('cvName').value || 'Họ và tên';
    document.getElementById('pdfPosition').innerText = document.getElementById('cvPosition').value || 'Vị trí ứng tuyển';
    document.getElementById('pdfAbout').innerText = document.getElementById('cvAbout').value || 'Giới thiệu bản thân';
    document.getElementById('pdfPhone').innerText = document.getElementById('cvPhone').value || '';
    document.getElementById('pdfEmail').innerText = document.getElementById('cvEmail').value || '';
    document.getElementById('pdfBirthday').innerText = document.getElementById('cvBirthday').value || '';
    document.getElementById('pdfGender').innerText = document.getElementById('cvGender').value || '';
    document.getElementById('pdfAddress').innerText = document.getElementById('cvAddress').value || '';
    
    // Đồng bộ danh sách
    syncListToPDF('educationList', 'pdfEducation');
    syncListToPDF('experienceList', 'pdfExperience');
    syncListToPDF('certificateList', 'pdfCertificate');
    syncListToPDF('hobbyList', 'pdfHobbies');
    
    // Đồng bộ kỹ năng
    const skills = document.getElementById('cvSkills').value.split(',').map(s => s.trim()).filter(Boolean);
    document.getElementById('pdfSkills').innerHTML = skills.map(s => `<div>• ${s}</div>`).join('');
}

function syncListToPDF(sourceId, targetId) {
    const source = document.getElementById(sourceId);
    const target = document.getElementById(targetId);
    const items = [];
    
    source.querySelectorAll('.input-group').forEach(row => {
        if (sourceId === 'educationList') {
            const school = row.querySelector('.edu-school').value;  
            const year = row.querySelector('.edu-year').value;
            if (school) {
                items.push(`<div><b>${school}</b> ${year ? `- ${year}` : ''}</div>`);
            }
        } else if (sourceId === 'experienceList') {
            const company = row.querySelector('.exp-company').value;
            const role = row.querySelector('.exp-role').value;
            const year = row.querySelector('.exp-year').value;
            if (company && role) {
                items.push(`<div><b>${company}</b> - ${role} ${year ? `(${year})` : ''}</div>`);
            }
        } else {
            const input = row.querySelector('input');
            const value = input.value;
            if (value) {
                items.push(`<div>• ${value}</div>`);
            }
        }
    });
    
    target.innerHTML = items.join('');
}

function saveCV() {
    try {
        // Thu thập dữ liệu từ form
        const cvData = {
            name: document.getElementById('cvName').value,
            position: document.getElementById('cvPosition').value,
            about: document.getElementById('cvAbout').value,
            phone: document.getElementById('cvPhone').value,
            email: document.getElementById('cvEmail').value,
            birthday: document.getElementById('cvBirthday').value,
            gender: document.getElementById('cvGender').value,
            address: document.getElementById('cvAddress').value,
            skills: document.getElementById('cvSkills').value,
            color: document.getElementById('cvColor').value,
            education: getListData('educationList', ['school', 'year']),
            experience: getListData('experienceList', ['company', 'role', 'year']),
            certificates: getListData('certificateList', ['name']),
            hobbies: getListData('hobbyList', ['name'])
        };
        
        // Lưu vào localStorage
        localStorage.setItem('cvData', JSON.stringify(cvData));
        
        // Hiển thị thông báo thành công
        showNotification('CV đã được lưu thành công!', 'success');
    } catch (error) {
        console.error('Lỗi khi lưu CV:', error);
        showNotification('Có lỗi xảy ra khi lưu CV!', 'error');
    }
}

function showNotification(message, type = 'info') {
    // Tạo thông báo
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'error' ? 'danger' : type === 'success' ? 'success' : 'info'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    // Thêm vào body
    document.body.appendChild(notification);
    
    // Tự động ẩn sau 3 giây
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 3000);
}

function getListData(listId, fields) {
    const data = [];
    document.querySelectorAll(`#${listId} .input-group`).forEach(row => {
        const item = {};
        fields.forEach(field => {
            const input = row.querySelector(`.${field.replace('company', 'exp-company').replace('role', 'exp-role').replace('school', 'edu-school').replace('year', 'edu-year').replace('name', 'hobby-name')}`);
            if (input) {
                item[field] = input.value;
            }
        });
        if (Object.values(item).some(val => val)) {
            data.push(item);
        }
    });
    return data;
}

function loadCV() {
    const savedData = localStorage.getItem('cvData');
    if (savedData) {
        try {
            const cvData = JSON.parse(savedData);
            
            // Điền dữ liệu vào form
            document.getElementById('cvName').value = cvData.name || '';
            document.getElementById('cvPosition').value = cvData.position || '';
            document.getElementById('cvAbout').value = cvData.about || '';
            document.getElementById('cvPhone').value = cvData.phone || '';
            document.getElementById('cvEmail').value = cvData.email || '';
            document.getElementById('cvBirthday').value = cvData.birthday || '';
            document.getElementById('cvGender').value = cvData.gender || '';
            document.getElementById('cvAddress').value = cvData.address || '';
            document.getElementById('cvSkills').value = cvData.skills || '';
            document.getElementById('cvColor').value = cvData.color || '#0d6efd';
            
            // Load danh sách
            loadListData('educationList', cvData.education || [], ['school', 'year']);
            loadListData('experienceList', cvData.experience || [], ['company', 'role', 'year']);
            loadListData('certificateList', cvData.certificates || [], ['name']);
            loadListData('hobbyList', cvData.hobbies || [], ['name']);
            
            // Trigger events để cập nhật preview
            document.getElementById('cvName').dispatchEvent(new Event('input'));
            document.getElementById('cvPosition').dispatchEvent(new Event('input'));
            document.getElementById('cvAbout').dispatchEvent(new Event('input'));
            document.getElementById('cvPhone').dispatchEvent(new Event('input'));
            document.getElementById('cvEmail').dispatchEvent(new Event('input'));
            document.getElementById('cvBirthday').dispatchEvent(new Event('input'));
            document.getElementById('cvGender').dispatchEvent(new Event('change'));
            document.getElementById('cvAddress').dispatchEvent(new Event('input'));
            document.getElementById('cvSkills').dispatchEvent(new Event('input'));
            document.getElementById('cvColor').dispatchEvent(new Event('input'));
            
            updatePreviewEducation();
            updatePreviewExperience();
            updatePreviewCertificate();
            updatePreviewHobby();
            
            showNotification('CV đã được tải thành công!', 'success');
        } catch (error) {
            console.error('Lỗi khi tải CV:', error);
            showNotification('Có lỗi xảy ra khi tải CV!', 'error');
        }
    } else {
        showNotification('Không có CV nào được lưu trước đó!', 'info');
    }
}

function loadListData(listId, data, fields) {
    const container = document.getElementById(listId);
    container.innerHTML = '';
    
    data.forEach(item => {
        if (listId === 'educationList') {
            addEducation({ school: item.school, year: item.year });
        } else if (listId === 'experienceList') {
            addExperience({ company: item.company, role: item.role, year: item.year });
        } else if (listId === 'certificateList') {
            addCertificate(item.name);
        } else if (listId === 'hobbyList') {
            addHobby(item.name);
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Load CV đã lưu
    loadCV();
    
    // Thêm mục mặc định nếu danh sách trống
    if (document.getElementById('educationList').children.length === 0) {
        addEducation();
    }
    if (document.getElementById('experienceList').children.length === 0) {
        addExperience();
    }
    if (document.getElementById('certificateList').children.length === 0) {
        addCertificate();
    }
    if (document.getElementById('hobbyList').children.length === 0) {
        addHobby();
    }
    
    // Họ và tên
    document.getElementById('cvName').addEventListener('input', function(e) {
        var el = document.getElementById('previewName');
        el.innerText = e.target.value || 'Họ và tên';
    });
    // Tiêu đề hồ sơ
    document.getElementById('cvPosition').addEventListener('input', function(e) {
        var el = document.getElementById('previewPosition');
        el.innerText = e.target.value || 'Tiêu đề hồ sơ';
    });
    // Giới thiệu bản thân
    document.getElementById('cvAbout').addEventListener('input', function(e) {
        var el = document.getElementById('previewAbout');
        el.innerText = e.target.value || 'Tóm tắt về bạn, mục tiêu nghề nghiệp...';
    });
    // Số điện thoại
    document.getElementById('cvPhone').addEventListener('input', function(e) {
        var el = document.getElementById('previewPhone');
        el.innerText = e.target.value || el.getAttribute('data-placeholder');
    });
    // Email
    document.getElementById('cvEmail').addEventListener('input', function(e) {
        var el = document.getElementById('previewEmail');
        el.innerText = e.target.value || el.getAttribute('data-placeholder');
    });
    // Ngày sinh
    document.getElementById('cvBirthday').addEventListener('input', function(e) {
        var el = document.getElementById('previewBirthday');
        el.innerText = e.target.value || el.getAttribute('data-placeholder');
    });
    // Giới tính
    document.getElementById('cvGender').addEventListener('change', function(e) {
        var el = document.getElementById('previewGender');
        el.innerText = e.target.value || el.getAttribute('data-placeholder');
    });
    // Địa chỉ
    document.getElementById('cvAddress').addEventListener('input', function(e) {
        var el = document.getElementById('previewAddress');
        el.innerText = e.target.value || el.getAttribute('data-placeholder');
    });
    // Kỹ năng
    document.getElementById('cvSkills').addEventListener('input', function(e) {
        var el = document.getElementById('previewSkills');
        var skills = e.target.value.split(',').map(s => s.trim()).filter(Boolean);
        el.innerHTML = skills.map(s => `<li>${s}</li>`).join('');
    });
    // Màu chủ đạo
    document.getElementById('cvColor').addEventListener('input', function(e) {
        var color = e.target.value;
        // Tiêu đề
        document.querySelectorAll('.cv-title').forEach(function(el){ el.style.color = color; });
        // Section title
        document.querySelectorAll('.cv-section-title').forEach(function(el){ el.style.color = color; });
        // Avatar border
        document.querySelectorAll('.cv-avatar').forEach(function(el){ el.style.borderColor = color; });
        // Icon sidebar
        document.querySelectorAll('.cv-sidebar-custom i').forEach(function(el){ el.style.color = color; });
    });
    // Avatar preview
    var avatarInput = document.getElementById('avatarInput');
    var avatarPreview = document.getElementById('avatarPreview');
    var previewAvatar = document.getElementById('previewAvatar');
    avatarInput.addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('Vui lòng chọn file hình ảnh!');
                return;
            }
            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File quá lớn! Vui lòng chọn file nhỏ hơn 5MB.');
                return;
            }
            
            var reader = new FileReader();
            reader.onload = function(evt) {
                avatarPreview.src = evt.target.result;
                previewAvatar.src = evt.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Form validation
    document.getElementById('cvForm').addEventListener('submit', function(e) {
        e.preventDefault();
        if (!document.getElementById('cvName').value.trim()) {
            alert('Vui lòng nhập họ và tên!');
            document.getElementById('cvName').focus();
            return false;
        }
        saveCV();
    });
});

function addCertificate(val) {
    const id = Date.now() + Math.floor(Math.random()*1000);
    const html = `<div class="input-group mb-2" data-id="${id}">
        <input type="text" class="form-control cert-name" placeholder="Chứng chỉ/Giải thưởng" value="${val||''}">
        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove(); updatePreviewCertificate();"><i class="fas fa-trash"></i></button>
    </div>`;
    document.getElementById('certificateList').insertAdjacentHTML('beforeend', html);
    updatePreviewCertificate();
}
function updatePreviewCertificate() {
    const list = document.getElementById('previewCertificate');
    list.innerHTML = '';
    document.querySelectorAll('#certificateList .input-group').forEach(row => {
        const cert = row.querySelector('.cert-name').value;
        if (cert) {
            list.innerHTML += `<li>${cert}</li>`;
        }
    });
}

function addExperience(val) {
    const id = Date.now() + Math.floor(Math.random()*1000);
    const html = `<div class="input-group mb-2" data-id="${id}">
        <input type="text" class="form-control exp-company" placeholder="Công ty" value="${val?.company||''}">
        <input type="text" class="form-control exp-role" placeholder="Vị trí" value="${val?.role||''}">
        <input type="text" class="form-control exp-year" placeholder="Năm" style="max-width:90px;" value="${val?.year||''}">
        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove(); updatePreviewExperience();"><i class="fas fa-trash"></i></button>
    </div>`;
    document.getElementById('experienceList').insertAdjacentHTML('beforeend', html);
    updatePreviewExperience();
}
function updatePreviewExperience() {
    const list = document.getElementById('previewExperience');
    list.innerHTML = '';
    document.querySelectorAll('#experienceList .input-group').forEach(row => {
        const company = row.querySelector('.exp-company').value;
        const role = row.querySelector('.exp-role').value;
        const year = row.querySelector('.exp-year').value;
        if (company && role) {
            list.innerHTML += `<li><b>${company}</b> - ${role} ${year?`(${year})`:''}</li>`;
        }
    });
}

function addHobby(val) {
    const id = Date.now() + Math.floor(Math.random()*1000);
    const html = `<div class="input-group mb-1" data-id="${id}">
        <input type="text" class="form-control hobby-name" placeholder="Sở thích" value="${val||''}">
        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove(); updatePreviewHobby();"><i class="fas fa-trash"></i></button>
    </div>`;
    document.getElementById('hobbyList').insertAdjacentHTML('beforeend', html);
    updatePreviewHobby();
}
function updatePreviewHobby() {
    const list = document.getElementById('previewHobbies');
    list.innerHTML = '';
    document.querySelectorAll('#hobbyList .input-group').forEach(row => {
        const hobby = row.querySelector('.hobby-name').value;
        if (hobby) {
            list.innerHTML += `<li>${hobby}</li>`;
        }
    });
}

function addEducation(val) {
    const id = Date.now() + Math.floor(Math.random()*1000);
    const html = `<div class="input-group mb-2" data-id="${id}">
        <input type="text" class="form-control edu-school" placeholder="Trường/Chuyên ngành" value="${val?.school||''}">
        <input type="text" class="form-control edu-year" placeholder="Năm tốt nghiệp" style="max-width:120px;" value="${val?.year||''}">
        <button type="button" class="btn btn-outline-danger" onclick="this.parentNode.remove(); updatePreviewEducation();"><i class="fas fa-trash"></i></button>
    </div>`;
    document.getElementById('educationList').insertAdjacentHTML('beforeend', html);
    updatePreviewEducation();
}
function updatePreviewEducation() {
    const list = document.getElementById('previewEducation');
    list.innerHTML = '';
    document.querySelectorAll('#educationList .input-group').forEach(row => {
        const school = row.querySelector('.edu-school').value;
        const year = row.querySelector('.edu-year').value;
        if (school) {
            list.innerHTML += `<li><b>${school}</b> ${year?`- ${year}`:''}</li>`;
        }
    });
}

// Thêm event listeners cho các danh sách động
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('certificateList').addEventListener('input', updatePreviewCertificate);
    document.getElementById('experienceList').addEventListener('input', updatePreviewExperience);
    document.getElementById('hobbyList').addEventListener('input', updatePreviewHobby);
    document.getElementById('educationList').addEventListener('input', updatePreviewEducation);
});
</script>

</body>
</html>