@extends('layouts.app')

@section('title', 'Đăng ký - Tìm kiếm việc làm 24h')

@section('content')
<div class="container-fluid px-0">
    {{-- Hero Section --}}
    <section class="register-hero py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); position: relative; overflow: hidden;">
        <div class="position-absolute top-0 end-0" style="width: 180px; height: 180px; background: #3b82f6; border-radius: 50%; opacity: 0.1; transform: translate(70px, -70px);"></div>
        <div class="position-absolute bottom-0 start-0" style="width: 120px; height: 120px; background: #8b5cf6; transform: rotate(45deg) translate(-60px, 60px); opacity: 0.1;"></div>
        
        <div class="container position-relative" style="z-index: 10;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3" style="color: #1e293b;">Chọn Loại Tài Khoản</h1>
                    <p class="lead text-muted mb-0" style="font-size: 1.25rem;">
                        Hãy chọn loại tài khoản phù hợp với nhu cầu của bạn để bắt đầu hành trình cùng vieclam24h
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                {{-- Nhà tuyển dụng --}}
                <div class="col-lg-5 col-md-6">
                    <div class="card border-0 shadow-lg h-100" style="border-radius: 20px; transition: all 0.3s ease; overflow: hidden;">
                        <div class="card-body p-0">
                            <div class="p-4 text-center" style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" 
                                     style="width: 100px; height: 100px; background: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-building fa-3x" style="color: #3b82f6;"></i>
                                </div>
                                <h2 class="h3 fw-bold mb-3" style="color: #1e293b;">Nhà Tuyển Dụng</h2>
                            </div>
                            <div class="p-4">
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #3b82f6;"></i>
                                        <span>Đăng tin tuyển dụng không giới hạn</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #3b82f6;"></i>
                                        <span>Tiếp cận hàng triệu ứng viên tiềm năng</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #3b82f6;"></i>
                                        <span>Quản lý hồ sơ ứng tuyển dễ dàng</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #3b82f6;"></i>
                                        <span>Xây dựng thương hiệu nhà tuyển dụng</span>
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <a href="{{route('create.employer')}}" class="btn btn-lg px-5 py-3 fw-semibold" 
                                       style="background: linear-gradient(135deg, #3b82f6, #2563eb); border: none; color: white; border-radius: 50px; transition: all 0.3s ease;">
                                        <i class="fas fa-user-tie me-2"></i>Đăng Ký Nhà Tuyển Dụng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ứng viên --}}
                <div class="col-lg-5 col-md-6">
                    <div class="card border-0 shadow-lg h-100" style="border-radius: 20px; transition: all 0.3s ease; overflow: hidden;">
                        <div class="card-body p-0">
                            <div class="p-4 text-center" style="background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" 
                                     style="width: 100px; height: 100px; background: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-user-graduate fa-3x" style="color: #22c55e;"></i>
                                </div>
                                <h2 class="h3 fw-bold mb-3" style="color: #1e293b;">Ứng Viên</h2>
                            </div>
                            <div class="p-4">
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #22c55e;"></i>
                                        <span>Tìm kiếm việc làm phù hợp</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #22c55e;"></i>
                                        <span>Tạo CV chuyên nghiệp miễn phí</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #22c55e;"></i>
                                        <span>Nhận thông báo việc làm phù hợp</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check-circle me-3" style="color: #22c55e;"></i>
                                        <span>Kết nối với nhà tuyển dụng hàng đầu</span>
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <a href="{{route('create.tim')}}" class="btn btn-lg px-5 py-3 fw-semibold" 
                                       style="background: linear-gradient(135deg, #22c55e, #16a34a); border: none; color: white; border-radius: 50px; transition: all 0.3s ease;">
                                        <i class="fas fa-user me-2"></i>Đăng Ký Ứng Viên
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Đã có tài khoản --}}
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="mb-3">Đã có tài khoản?</p>
                    <a href="{{route('login')}}" class="btn btn-outline-primary btn-lg px-5 py-3 fw-semibold" style="border-radius: 50px;">
                        <i class="fas fa-sign-in-alt me-2"></i>Đăng Nhập Ngay
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Thông tin thêm --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="h3 fw-bold mb-4" style="color: #1e293b;">Tại sao chọn vieclam24h?</h2>
                    <p class="text-muted">Chúng tôi kết nối hàng triệu ứng viên với các nhà tuyển dụng hàng đầu Việt Nam</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                 style="width: 70px; height: 70px; background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                                <i class="fas fa-rocket fa-2x" style="color: #3b82f6;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #1e293b;">Nhanh chóng & Hiệu quả</h5>
                            <p class="text-muted small mb-0">
                                Kết nối nhanh chóng giữa nhà tuyển dụng và ứng viên, tiết kiệm thời gian và chi phí.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                 style="width: 70px; height: 70px; background: linear-gradient(135deg, #dcfce7, #bbf7d0);">
                                <i class="fas fa-shield-alt fa-2x" style="color: #22c55e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #1e293b;">An toàn & Bảo mật</h5>
                            <p class="text-muted small mb-0">
                                Thông tin cá nhân và doanh nghiệp được bảo vệ tuyệt đối, đảm bảo an toàn cho người dùng.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                 style="width: 70px; height: 70px; background: linear-gradient(135deg, #fef3c7, #fde68a);">
                                <i class="fas fa-headset fa-2x" style="color: #f59e0b;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #1e293b;">Hỗ trợ 24/7</h5>
                            <p class="text-muted small mb-0">
                                Đội ngũ hỗ trợ chuyên nghiệp luôn sẵn sàng giải đáp mọi thắc mắc của bạn.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.register-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="register-pattern" width="25" height="25" patternUnits="userSpaceOnUse"><circle cx="12.5" cy="12.5" r="1" fill="%23cbd5e1" opacity="0.4"/></pattern></defs><rect width="100" height="100" fill="url(%23register-pattern)"/></svg>');
    pointer-events: none;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .lead {
        font-size: 1.125rem;
    }
}
</style>
@endsection
