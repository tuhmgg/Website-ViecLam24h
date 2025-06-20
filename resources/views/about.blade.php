@extends('layouts.app')

@section('title', 'Giới thiệu - vieclam24h')

@section('content')
<div class="container-fluid px-0">
    {{-- Hero Section --}}
    <section class="about-hero py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); position: relative; overflow: hidden;">
        <div class="position-absolute top-0 end-0" style="width: 150px; height: 150px; background: #3b82f6; border-radius: 50%; opacity: 0.1; transform: translate(50px, -50px);"></div>
        <div class="position-absolute bottom-0 start-0" style="width: 200px; height: 200px; background: #8b5cf6; border-radius: 50%; opacity: 0.1; transform: translate(-100px, 100px);"></div>
        
        <div class="container position-relative" style="z-index: 10;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4" style="color: #1e293b;">Giới Thiệu</h1>
                    <p class="lead text-muted mb-0" style="font-size: 1.25rem;">
                        Kết nối ước mơ nghề nghiệp với cơ hội thực tế
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-5">
        <div class="container">
            {{-- Welcome Section --}}
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h2 class="h3 fw-bold mb-4" style="color: #1e293b;">
                            Chào mừng bạn đến với <span style="color: #3b82f6;">ViecLam24h</span>
                        </h2>
                        <p class="lead text-muted">
                            Nền tảng tuyển dụng hàng đầu Việt Nam, nơi kết nối hàng triệu ứng viên 
                            với những cơ hội nghề nghiệp tuyệt vời từ các doanh nghiệp uy tín.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Mission Section --}}
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="pe-lg-4">
                        <h3 class="h4 fw-bold mb-3" style="color: #1e293b;">Sứ mệnh của chúng tôi</h3>
                        <p class="text-muted mb-4">
                            Website Việc Làm 24h là một website tìm kiếm việc làm nhanh chóng và hiệu quả, chuyên cung cấp thông tin tuyển dụng đa ngành nghề trong phạm vi nội địa. Website được thiết kế tập trung, minh bạch và đổi mới nhằm mang đến trải nghiệm dễ sử dụng, dễ tiếp cận cho tất cả đối tượng người dùng, bao gồm sinh viên mới ra trường, người có kinh nghiệm làm việc, lao động phổ thông và cả các freelancer tự do.
                        </p>
                        <p class="text-muted">
                            Hệ thống đảm bảo truyền tải thông tin tuyển dụng một cách đầy đủ, chính xác và minh bạch, giúp người tìm việc tiếp cận các cơ hội phù hợp một cách nhanh nhất. Đồng thời, website cũng hỗ trợ các doanh nghiệp trong việc đăng tin tuyển dụng, quản lý ứng viên và tối ưu hóa quy trình tuyển dụng. Việc Làm 24h cam kết trở thành cầu nối uy tín giữa người lao động và nhà tuyển dụng, góp phần nâng cao hiệu quả và chất lượng thị trường lao động tại Việt Nam.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <div class="bg-light rounded-3 p-5" style="background: linear-gradient(135deg, #dbeafe 0%, #e0e7ff 100%) !important;">
                            <i class="fas fa-handshake fa-4x mb-3" style="color: #3b82f6;"></i>
                            <h5 class="fw-bold" style="color: #1e293b;">Kết nối thành công</h5>
                            <p class="text-muted small mb-0">Hơn 1 triệu kết nối thành công</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Features Section --}}
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-center mb-5">
                        <h3 class="h4 fw-bold mb-3" style="color: #1e293b;">Với ViecLam24h, bạn có thể</h3>
                        <p class="text-muted">Khám phá những tính năng nổi bật giúp bạn thành công</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 h-100 text-center p-4" style="background: #fef7ff; border-radius: 20px;">
                        <div class="mb-3">
                            <i class="fas fa-user-edit fa-3x" style="color: #8b5cf6;"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: #1e293b;">Tạo hồ sơ chuyên nghiệp</h5>
                        <p class="text-muted small">
                            Xây dựng profile ấn tượng với công cụ tạo CV thông minh, 
                            thể hiện rõ nhất khả năng và kinh nghiệm của bạn.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 h-100 text-center p-4" style="background: #f0f9ff; border-radius: 20px;">
                        <div class="mb-3">
                            <i class="fas fa-search fa-3x" style="color: #0ea5e9;"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: #1e293b;">Tìm kiếm việc làm</h5>
                        <p class="text-muted small">
                            Khám phá hàng nghìn cơ hội việc làm từ các doanh nghiệp uy tín, 
                            lọc theo vị trí, mức lương và kinh nghiệm phù hợp.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 h-100 text-center p-4" style="background: #f0fdf4; border-radius: 20px;">
                        <div class="mb-3">
                            <i class="fas fa-comments fa-3x" style="color: #22c55e;"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: #1e293b;">Tương tác linh hoạt</h5>
                        <p class="text-muted small">
                            Kết nối trực tiếp với nhà tuyển dụng, nhận phản hồi nhanh chóng 
                            và theo dõi tiến trình ứng tuyển một cách thuận tiện.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 h-100 text-center p-4" style="background: #fefce8; border-radius: 20px;">
                        <div class="mb-3">
                            <i class="fas fa-robot fa-3x" style="color: #eab308;"></i>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: #1e293b;">Trợ lý AI thông minh</h5>
                        <p class="text-muted small">
                            Công cụ AI hỗ trợ tối ưu hóa CV, gợi ý việc làm phù hợp 
                            và tư vấn nghề nghiệp cá nhân hóa.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Stats Section --}}
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); border-radius: 25px;">
                        <div class="card-body p-5">
                            <div class="row text-center text-white">
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <h3 class="display-6 fw-bold mb-2">1M+</h3>
                                    <p class="mb-0 opacity-75">Ứng viên tin tưởng</p>
                                </div>
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <h3 class="display-6 fw-bold mb-2">50K+</h3>
                                    <p class="mb-0 opacity-75">Doanh nghiệp đối tác</p>
                                </div>
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <h3 class="display-6 fw-bold mb-2">100K+</h3>
                                    <p class="mb-0 opacity-75">Việc làm mỗi tháng</p>
                                </div>
                                <div class="col-md-3">
                                    <h3 class="display-6 fw-bold mb-2">24/7</h3>
                                    <p class="mb-0 opacity-75">Hỗ trợ không ngừng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CTA Section --}}
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h3 class="h4 fw-bold mb-4" style="color: #1e293b;">
                            Sẵn sàng bắt đầu hành trình nghề nghiệp?
                        </h3>
                        <p class="text-muted mb-4">
                            Hãy cùng chúng tôi khám phá và thành công trong thị trường lao động 
                            đầy cạnh tranh ngày nay!
                        </p>
                        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                            <a href="{{route('register')}}" class="btn btn-lg px-4 py-3 fw-semibold" 
                               style="background: linear-gradient(135deg, #0ea5e9, #8b5cf6); border: none; color: white; border-radius: 50px; transition: all 0.3s ease;">
                                <i class="fas fa-user-plus me-2"></i>Đăng ký ngay
                            </a>
                            <a href="{{route('job.index')}}" class="btn btn-outline-primary btn-lg px-4 py-3 fw-semibold" 
                               style="border-radius: 50px; border-width: 2px;">
                                <i class="fas fa-search me-2"></i>Tìm việc làm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.about-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23cbd5e1" opacity="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
    pointer-events: none;
}

.card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
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
