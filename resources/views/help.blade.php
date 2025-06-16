@extends('layouts.app')

@section('title', 'Hướng dẫn sử dụng - vieclam24h')

@section('content')
<div class="container-fluid px-0">
    {{-- Hero Section --}}
    <section class="guide-hero py-5" style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); position: relative; overflow: hidden;">
        <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: #3b82f6; border-radius: 50%; opacity: 0.1; transform: translate(80px, -80px);"></div>
        <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: #8b5cf6; transform: rotate(45deg) translate(-75px, 75px); opacity: 0.1;"></div>
        
        <div class="container position-relative" style="z-index: 10;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <i class="fas fa-book-open fa-4x mb-3" style="color: #3b82f6;"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-4" style="color: #1e293b;">Hướng Dẫn Sử Dụng</h1>
                    <p class="lead text-muted mb-0" style="font-size: 1.25rem;">
                        Khám phá cách sử dụng vieclam24h để tối ưu hóa hành trình tìm kiếm việc làm của bạn
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-5">
        <div class="container">
            {{-- Welcome Message --}}
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h2 class="h3 fw-bold mb-4" style="color: #1e293b;">
                            Chào mừng bạn đến với <span style="color: #3b82f6;">vieclam24h</span>
                        </h2>
                        <p class="lead text-muted">
                            Dưới đây là hướng dẫn từng bước để bạn có thể tận dụng tối đa các tính năng của chúng tôi
                        </p>
                    </div>
                </div>
            </div>

            {{-- Step by Step Guide --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="h4 fw-bold text-center mb-5" style="color: #1e293b;">Hướng dẫn từng bước</h3>
                </div>
            </div>

            <div class="row g-4 mb-5">
                {{-- Step 1 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                     style="width: 80px; height: 80px; background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                                    <i class="fas fa-user-edit fa-2x" style="color: #3b82f6;"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <span class="badge position-absolute top-0 start-0 translate-middle rounded-pill" 
                                      style="background: #3b82f6; font-size: 0.75rem;">1</span>
                                <h5 class="fw-bold mb-3" style="color: #1e293b;">Tạo Hồ Sơ CV</h5>
                            </div>
                            <p class="text-muted small mb-0">
                                Bắt đầu bằng cách tạo CV chuyên nghiệp với công cụ thiết kế thông minh. 
                                Chọn mẫu phù hợp và điền thông tin cá nhân, kinh nghiệm làm việc.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                     style="width: 80px; height: 80px; background: linear-gradient(135deg, #dcfce7, #bbf7d0);">
                                    <i class="fas fa-search fa-2x" style="color: #22c55e;"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <span class="badge position-absolute top-0 start-0 translate-middle rounded-pill" 
                                      style="background: #22c55e; font-size: 0.75rem;">2</span>
                                <h5 class="fw-bold mb-3" style="color: #1e293b;">Tìm Việc Làm</h5>
                            </div>
                            <p class="text-muted small mb-0">
                                Sử dụng công cụ tìm kiếm thông minh với bộ lọc theo vị trí, mức lương, 
                                kinh nghiệm để tìm ra công việc phù hợp nhất.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                     style="width: 80px; height: 80px; background: linear-gradient(135deg, #fef3c7, #fde68a);">
                                    <i class="fas fa-handshake fa-2x" style="color: #f59e0b;"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <span class="badge position-absolute top-0 start-0 translate-middle rounded-pill" 
                                      style="background: #f59e0b; font-size: 0.75rem;">3</span>
                                <h5 class="fw-bold mb-3" style="color: #1e293b;">Liên Hệ Nhà Tuyển Dụng</h5>
                            </div>
                            <p class="text-muted small mb-0">
                                Kết nối trực tiếp với nhà tuyển dụng, gửi hồ sơ ứng tuyển và 
                                theo dõi tiến trình một cách thuận tiện.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Step 4 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                     style="width: 80px; height: 80px; background: linear-gradient(135deg, #fce7f3, #fbcfe8);">
                                    <i class="fas fa-robot fa-2x" style="color: #ec4899;"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <span class="badge position-absolute top-0 start-0 translate-middle rounded-pill" 
                                      style="background: #ec4899; font-size: 0.75rem;">4</span>
                                <h5 class="fw-bold mb-3" style="color: #1e293b;">Sử Dụng Trợ Lý AI</h5>
                            </div>
                            <p class="text-muted small mb-0">
                                Tận dụng AI để tối ưu hóa CV, nhận gợi ý việc làm phù hợp 
                                và tư vấn nghề nghiệp cá nhân hóa.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Step 5 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                     style="width: 80px; height: 80px; background: linear-gradient(135deg, #e0e7ff, #c7d2fe);">
                                    <i class="fas fa-users fa-2x" style="color: #6366f1;"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <span class="badge position-absolute top-0 start-0 translate-middle rounded-pill" 
                                      style="background: #6366f1; font-size: 0.75rem;">5</span>
                                <h5 class="fw-bold mb-3" style="color: #1e293b;">Tham Gia Cộng Đồng</h5>
                            </div>
                            <p class="text-muted small mb-0">
                                Kết nối với cộng đồng chuyên nghiệp, chia sẻ kinh nghiệm 
                                và mở rộng mạng lưới quan hệ nghề nghiệp.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Step 6 --}}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                                     style="width: 80px; height: 80px; background: linear-gradient(135deg, #fef2f2, #fecaca);">
                                    <i class="fas fa-headset fa-2x" style="color: #ef4444;"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <span class="badge position-absolute top-0 start-0 translate-middle rounded-pill" 
                                      style="background: #ef4444; font-size: 0.75rem;">6</span>
                                <h5 class="fw-bold mb-3" style="color: #1e293b;">Nhận Hỗ Trợ 24/7</h5>
                            </div>
                            <p class="text-muted small mb-0">
                                Đội ngũ hỗ trợ chuyên nghiệp luôn sẵn sàng giải đáp thắc mắc 
                                và hỗ trợ bạn mọi lúc, mọi nơi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Access Section --}}
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="h4 fw-bold text-center mb-5" style="color: #1e293b;">Truy cập nhanh</h3>
                </div>
            </div>

            {{-- For Job Seekers --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center mb-3 mb-md-0">
                                    <i class="fas fa-user-tie fa-3x mb-2" style="color: #3b82f6;"></i>
                                    <h5 class="fw-bold" style="color: #1e293b;">Dành cho Ứng viên</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="row g-2">
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('create.cv')}}" class="btn btn-outline-primary w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-file-alt me-2"></i>Tạo CV
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('user.profile')}}" class="btn btn-outline-success w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-user me-2"></i>Profile
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('suggest')}}" class="btn btn-outline-warning w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-robot me-2"></i>Trợ Lý AI
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- For Employers --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; background: linear-gradient(135deg, #fefce8 0%, #fef3c7 100%);">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center mb-3 mb-md-0">
                                    <i class="fas fa-building fa-3x mb-2" style="color: #f59e0b;"></i>
                                    <h5 class="fw-bold" style="color: #1e293b;">Dành cho Nhà tuyển dụng</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="row g-2">
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('create.employer')}}" class="btn btn-outline-dark w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-user-plus me-2"></i>Đăng ký NTD
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('job.create')}}" class="btn btn-outline-secondary w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-plus me-2"></i>Đăng tin
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('subscribe')}}" class="btn btn-outline-danger w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-crown me-2"></i>Gói dịch vụ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- General Access --}}
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center mb-3 mb-md-0">
                                    <i class="fas fa-cogs fa-3x mb-2" style="color: #0ea5e9;"></i>
                                    <h5 class="fw-bold" style="color: #1e293b;">Quản lý chung</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="row g-2">
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('dashboard')}}" class="btn btn-outline-primary w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <a href="{{route('create.tim')}}" class="btn btn-outline-info w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-heart me-2"></i>Đăng ký Tim
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <a href="#" class="btn btn-outline-secondary w-100 py-2" style="border-radius: 10px;">
                                                <i class="fas fa-search me-2"></i>Tìm kiếm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Final Message --}}
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); border-radius: 25px;">
                            <div class="card-body p-5 text-white">
                                <i class="fas fa-rocket fa-3x mb-3"></i>
                                <h3 class="h4 fw-bold mb-3">Bắt đầu hành trình thành công!</h3>
                                <p class="mb-4 opacity-75">
                                    Chúng tôi hy vọng hướng dẫn này sẽ giúp bạn có trải nghiệm tuyệt vời 
                                    khi sử dụng vieclam24h. Hãy bắt đầu ngay hôm nay!
                                </p>
                                <a href="{{route('register')}}" class="btn btn-light btn-lg px-4 py-3 fw-semibold" 
                                   style="border-radius: 50px; color: #1e293b;">
                                    <i class="fas fa-arrow-right me-2"></i>Bắt đầu ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.guide-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="guide-pattern" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23cbd5e1" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23guide-pattern)"/></svg>');
    pointer-events: none;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.btn:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .lead {
        font-size: 1.125rem;
    }
    
    .fa-4x {
        font-size: 2.5rem;
    }
}
</style>
@endsection
