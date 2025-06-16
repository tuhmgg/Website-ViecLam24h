@extends('layouts.app')

@section('title', 'Liên hệ - vieclam24h')

@section('content')
<div class="container-fluid px-0">
    {{-- Hero Section --}}
    <section class="contact-hero py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); position: relative; overflow: hidden;">
        <div class="position-absolute top-0 end-0" style="width: 180px; height: 180px; background: #3b82f6; border-radius: 50%; opacity: 0.1; transform: translate(70px, -70px);"></div>
        <div class="position-absolute bottom-0 start-0" style="width: 120px; height: 120px; background: #8b5cf6; transform: rotate(45deg) translate(-60px, 60px); opacity: 0.1;"></div>
        
        <div class="container position-relative" style="z-index: 10;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <i class="fas fa-envelope fa-4x mb-3" style="color: #3b82f6;"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-4" style="color: #1e293b;">Liên Hệ Với Chúng Tôi</h1>
                    <p class="lead text-muted mb-0" style="font-size: 1.25rem;">
                        Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn trong mọi vấn đề
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-5">
        <div class="container">
            {{-- Contact Form & Info --}}
            <div class="row g-5 mb-5">
                {{-- Contact Form --}}
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <h3 class="h4 fw-bold mb-4" style="color: #1e293b;">
                                <i class="fas fa-paper-plane me-3" style="color: #3b82f6;"></i>
                                Gửi tin nhắn cho chúng tôi
                            </h3>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold">Họ và tên *</label>
                                        <input type="text" class="form-control py-3" id="name" 
                                               style="border-radius: 12px; border: 2px solid #e2e8f0;" 
                                               placeholder="Nhập họ và tên của bạn">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold">Email *</label>
                                        <input type="email" class="form-control py-3" id="email" 
                                               style="border-radius: 12px; border: 2px solid #e2e8f0;" 
                                               placeholder="Nhập địa chỉ email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label fw-semibold">Số điện thoại</label>
                                        <input type="tel" class="form-control py-3" id="phone" 
                                               style="border-radius: 12px; border: 2px solid #e2e8f0;" 
                                               placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subject" class="form-label fw-semibold">Chủ đề *</label>
                                        <select class="form-select py-3" id="subject" 
                                                style="border-radius: 12px; border: 2px solid #e2e8f0;">
                                            <option value="">Chọn chủ đề</option>
                                            <option value="support">Hỗ trợ kỹ thuật</option>
                                            <option value="job">Vấn đề về việc làm</option>
                                            <option value="employer">Dành cho nhà tuyển dụng</option>
                                            <option value="partnership">Hợp tác kinh doanh</option>
                                            <option value="other">Khác</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label fw-semibold">Nội dung tin nhắn *</label>
                                        <textarea class="form-control" id="message" rows="6" 
                                                  style="border-radius: 12px; border: 2px solid #e2e8f0;" 
                                                  placeholder="Nhập nội dung tin nhắn của bạn..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-lg px-5 py-3 fw-semibold" 
                                                style="background: linear-gradient(135deg, #0ea5e9, #8b5cf6); border: none; color: white; border-radius: 50px; transition: all 0.3s ease;">
                                            <i class="fas fa-paper-plane me-2"></i>Gửi tin nhắn
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Contact Info --}}
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 2rem;">
                        {{-- Contact Details --}}
                        <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px;">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4" style="color: #1e293b;">Thông tin liên hệ</h5>
                                
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle" 
                                             style="width: 50px; height: 50px; background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                                            <i class="fas fa-envelope" style="color: #3b82f6;"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-muted small mb-0">contact@vieclam24h.vn</p>
                                        <p class="text-muted small mb-0">support@vieclam24h.vn</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle" 
                                             style="width: 50px; height: 50px; background: linear-gradient(135deg, #dcfce7, #bbf7d0);">
                                            <i class="fas fa-phone" style="color: #22c55e;"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Hotline</h6>
                                        <p class="text-muted small mb-0">1900 1234 (24/7)</p>
                                        <p class="text-muted small mb-0">(+84) 28 1234 5678</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle" 
                                             style="width: 50px; height: 50px; background: linear-gradient(135deg, #fef3c7, #fde68a);">
                                            <i class="fas fa-map-marker-alt" style="color: #f59e0b;"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Địa chỉ</h6>
                                        <p class="text-muted small mb-0">Tầng 10, Tòa nhà ABC</p>
                                        <p class="text-muted small mb-0">123 Nguyễn Huệ, Q.1, TP.HCM</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle" 
                                             style="width: 50px; height: 50px; background: linear-gradient(135deg, #fce7f3, #fbcfe8);">
                                            <i class="fas fa-clock" style="color: #ec4899;"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Giờ làm việc</h6>
                                        <p class="text-muted small mb-0">T2 - T6: 8:00 - 18:00</p>
                                        <p class="text-muted small mb-0">T7: 8:00 - 12:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Quick Support --}}
                        <div class="card border-0 shadow-lg" style="border-radius: 20px; background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
                            <div class="card-body p-4 text-center">
                                <i class="fas fa-headset fa-3x mb-3" style="color: #0ea5e9;"></i>
                                <h6 class="fw-bold mb-2" style="color: #1e293b;">Cần hỗ trợ ngay?</h6>
                                <p class="text-muted small mb-3">Chat trực tiếp với đội ngũ hỗ trợ</p>
                                <button class="btn btn-outline-primary btn-sm px-4" style="border-radius: 25px;">
                                    <i class="fas fa-comments me-2"></i>Chat ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Team Section --}}
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-center mb-5">
                        <h3 class="h4 fw-bold mb-3" style="color: #1e293b;">Đội ngũ phát triển</h3>
                        <p class="text-muted">Những người đứng sau thành công của vieclam24h</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center g-4 mb-5">
    <!-- Founder & CEO -->
    <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg text-center" style="border-radius: 20px;">
            <div class="card-body p-4">
                <div class="mb-3">
                    <img src="img/profile.jpg" 
                         class="rounded-circle border border-3 border-primary" 
                         width="100" height="100" alt="Minh Tú">
                </div>
                <h5 class="fw-bold mb-2" style="color: #1e293b;">Minh Tú</h5>
                <p class="text-primary fw-semibold mb-2">Founder & CEO</p>
                <p class="text-muted small mb-3">
                    Đam mê công nghệ và mong muốn xây dựng cộng đồng hỗ trợ 
                    mạnh mẽ cho việc tìm kiếm việc làm.
                </p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="https://www.facebook.com/minhtu.huynh.10" class="btn btn-sm btn-outline-primary" style="border-radius: 50%;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://github.com/tuhmgg" class="btn btn-sm btn-outline-dark" style="border-radius: 50%;">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.youtube.com/@MT_TinhocVP" class="btn btn-sm btn-outline-danger" style="border-radius: 50%;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Nhà phát triển -->
    <div class="col-md-6 col-lg-4">
        <div class="card border-0 shadow-lg text-center" style="border-radius: 20px;">
            <div class="card-body p-4">
                <div class="mb-3">
                    <img src="img/profile-NPT.jpg" 
                         class="rounded-circle border border-3 border-success" 
                         width="100" height="100" alt="Nhà phát triển">
                </div>
                <h5 class="fw-bold mb-2" style="color: #1e293b;">Trần Tiến Đạt</h5>
                <p class="text-success fw-semibold mb-2">Nhà phát triển</p>
                <p class="text-muted small mb-3">
                    Chuyên gia phát triển web với kinh nghiệm trong việc xây dựng 
                    các ứng dụng tuyển dụng hiện đại và thân thiện người dùng.
                </p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="https://www.facebook.com/tran.tien.dat.0805?mibextid=wwXIfr&rdid=w20ziisxvj3NBKCo&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F18yAyV3T8J%2F%3Fmibextid%3DwwXIfr#" class="btn btn-sm btn-outline-primary" style="border-radius: 50%;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://github.com/Tiendat0805" class="btn btn-sm btn-outline-dark" style="border-radius: 50%;">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.youtube.com/@tienat3132" class="btn btn-sm btn-outline-danger" style="border-radius: 50%;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

            {{-- Social Media & Map --}}
            <div class="row g-5">
                {{-- Social Media --}}
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <h4 class="fw-bold mb-4" style="color: #1e293b;">
                                <i class="fas fa-share-alt me-3" style="color: #3b82f6;"></i>
                                Kết nối với chúng tôi
                            </h4>
                            <p class="text-muted mb-4">
                                Theo dõi chúng tôi trên các mạng xã hội để cập nhật tin tức mới nhất, 
                                hướng dẫn và thông tin về thị trường việc làm.
                            </p>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <a href="https://facebook.com/vieclam24h" class="btn btn-outline-primary w-100 py-3" style="border-radius: 15px;">
                                        <i class="fab fa-facebook-f me-2"></i>Facebook
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="https://github.com/vieclam24h" class="btn btn-outline-dark w-100 py-3" style="border-radius: 15px;">
                                        <i class="fab fa-github me-2"></i>GitHub
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="https://youtube.com/@vieclam24h" class="btn btn-outline-danger w-100 py-3" style="border-radius: 15px;">
                                        <i class="fab fa-youtube me-2"></i>YouTube
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="https://linkedin.com/company/vieclam24h" class="btn btn-outline-info w-100 py-3" style="border-radius: 15px;">
                                        <i class="fab fa-linkedin-in me-2"></i>LinkedIn
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Map --}}
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                        <div class="card-body p-0">
                            <div class="position-relative" style="height: 300px; border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);">
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <i class="fas fa-map-marked-alt fa-4x mb-3" style="color: #3b82f6; opacity: 0.5;"></i>
                                    <h6 class="fw-bold" style="color: #64748b;">Bản đồ văn phòng</h6>
                                    <p class="text-muted small mb-0">123 Nguyễn Huệ, Q.1, TP.HCM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Final Message --}}
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="text-center">
                        <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); border-radius: 25px;">
                            <div class="card-body p-5 text-white">
                                <i class="fas fa-heart fa-3x mb-3"></i>
                                <h3 class="h4 fw-bold mb-3">Cảm ơn bạn đã đồng hành!</h3>
                                <p class="mb-4 opacity-75">
                                    Nếu bạn có bất kỳ góp ý nào để cải thiện dịch vụ của chúng tôi, 
                                    hãy gửi email về địa chỉ contact@vieclam24h.vn. 
                                    Chúng tôi rất trân trọng ý kiến của bạn!
                                </p>
                                <a href="mailto:contact@vieclam24h.vn" class="btn btn-light btn-lg px-4 py-3 fw-semibold" 
                                   style="border-radius: 50px; color: #1e293b;">
                                    <i class="fas fa-envelope me-2"></i>Gửi email ngay
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
.contact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="contact-pattern" width="25" height="25" patternUnits="userSpaceOnUse"><circle cx="12.5" cy="12.5" r="1" fill="%23cbd5e1" opacity="0.4"/></pattern></defs><rect width="100" height="100" fill="url(%23contact-pattern)"/></svg>');
    pointer-events: none;
}

.form-control:focus, .form-select:focus {
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25) !important;
}

.card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .sticky-top {
        position: relative !important;
        top: auto !important;
    }
}
</style>
@endsection
