@extends('layouts.app')

@section('title','Trang chủ - Tìm kiếm việc làm 24h')

@section('content')
<div class="container-fluid px-0">
    {{-- Hero Section --}}
    <section class="hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #87CEEB 0%, #1E90FF 100%); min-height: 70vh;">
        {{-- Geometric Shapes --}}
        <div class="position-absolute top-0 end-0 hero-shape" style="width: 200px; height: 200px; background: #4169E1; border-radius: 50%; opacity: 0.8; transform: translate(50px, -50px);"></div>
        <div class="position-absolute bottom-0 start-0 hero-shape" style="width: 150px; height: 150px; background: #00BFFF; transform: rotate(45deg) translate(-50px, 50px);"></div>
        <div class="position-absolute hero-shape" style="top: 30%; right: 20%; width: 250px; height: 250px; background: #ffffff; border-radius: 50%; opacity: 0.2;"></div>
        
        <div class="container position-relative" style="z-index: 10;">
            <div class="row align-items-center min-vh-70">
                <div class="col-lg-6 py-5 pe-lg-4">
                    <h1 class="display-3 fw-bold mb-4 hero-title" style="font-family: 'Inter', sans-serif; color: #1f2937; line-height: 1.1; text-shadow: 0 2px 4px rgba(255,255,255,0.3);">
                        Kết Nối Với Sự Thành Công
                    </h1>
                    <p class="lead mb-4 hero-desc" style="color: #374151; font-size: 1.25rem; line-height: 1.6; text-shadow: 0 1px 2px rgba(255,255,255,0.2);">
                        Tự do chọn lựa công việc, khám phá sức mạnh nghề nghiệp và tiến gần hơn đến mục tiêu sự nghiệp lớn lao của bạn.
                    </p>
                    <a href="{{route('register')}}" class="btn btn-gradient btn-lg px-5 py-3 fw-bold hero-btn" style="border-radius: 50px; font-size: 1.125rem; background: linear-gradient(135deg, #0ea5e9, #8b5cf6); border: none; color: white; transition: all 0.3s ease;">
                        Đăng Ký
                    </a>
                </div>
                <div class="col-lg-6 text-center ps-lg-2">
                    <img class="img-fluid hero-img zoom-img" src="{{asset('image/banner-man2.png')}}" alt="Hero Banner" style="max-height: 500px; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.1));">
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-5" style="margin-top: -80px; position: relative; z-index: 20;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg" style="border-radius: 25px; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
                        <div class="card-body py-4">
                            <div class="row text-center">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="mb-2">
                                            <i class="fas fa-users fa-2x text-primary"></i>
                                        </div>
                                        <h3 class="fw-bold mb-1" style="font-family: 'Inter', sans-serif; color: #1f2937;">{{number_format($countEmployee)}}</h3>
                                        <p class="text-muted mb-0">Ứng viên</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="mb-2">
                                            <i class="fas fa-briefcase fa-2x text-success"></i>
                                        </div>
                                        <h3 class="fw-bold mb-1" style="font-family: 'Inter', sans-serif; color: #1f2937;">{{number_format($count)}}</h3>
                                        <p class="text-muted mb-0">Công Việc</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="mb-2">
                                            <i class="fas fa-building fa-2x text-warning"></i>
                                        </div>
                                        <h3 class="fw-bold mb-1" style="font-family: 'Inter', sans-serif; color: #1f2937;">{{number_format($countCompany)}}</h3>
                                        <p class="text-muted mb-0">Công Ty</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Jobs Section --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3" id="res" style="color: #1f2937;">Công Việc Mới Nhất</h2>
            <p class="lead text-muted">Khám phá những cơ hội nghề nghiệp tốt nhất</p>
        </div>

        {{-- Search Section --}}
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg" style="border-radius: 25px;">
                    <div class="card-body p-4">
                        <form action="{{route('job.search')}}#res" method="get">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-6">
                                    <div class="position-relative">
                                        <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                        <input type="text" name="search" class="form-control ps-5 py-3 border-0 bg-light" 
                                               placeholder="Tìm Kiếm Công Việc" 
                                               style="border-radius: 15px;" 
                                               value="{{ $search }}">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <div class="position-relative">
                                        <i class="fas fa-map-marker-alt position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                        <input type="text" name="address" class="form-control ps-5 py-3 border-0 bg-light" 
                                               placeholder="Địa chỉ" 
                                               style="border-radius: 15px;" 
                                               value="{{ $address }}">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <select name="job_type" class="form-select py-3 border-0 bg-light" style="border-radius: 15px;">
                                        <option value="">Loại công việc</option>
                                        <option {{ $jobType == 'Fulltime' ? 'selected' : '' }}>Fulltime</option>
                                        <option {{ $jobType == 'Parttime' ? 'selected' : '' }}>Parttime</option>
                                        <option {{ $jobType == 'Từ Xa' ? 'selected' : '' }}>Từ Xa</option>
                                        <option {{ $jobType == 'Hợp Đồng' ? 'selected' : '' }}>Hợp Đồng</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <select name="salary_range" class="form-select py-3 border-0 bg-light" style="border-radius: 15px;">
                                        <option value="">Mức lương</option>
                                        <option {{ $salaryRange == 'Dưới 5 triệu' ? 'selected' : '' }}>Dưới 5 triệu</option>
                                        <option {{ $salaryRange == '5 - 10 triệu' ? 'selected' : '' }}>5 - 10 triệu</option>
                                        <option {{ $salaryRange == '10 - 15 triệu' ? 'selected' : '' }}>10 - 15 triệu</option>
                                        <option {{ $salaryRange == 'Trên 15 triệu' ? 'selected' : '' }}>Trên 15 triệu</option>
                                        <option {{ $salaryRange == 'Thỏa Thuận' ? 'selected' : '' }}>Thỏa Thuận</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-12">
                                    <button type="submit" class="btn btn-gradient w-100 py-3 fw-semibold" style="border-radius: 15px; background: linear-gradient(135deg, #0ea5e9, #8b5cf6); border: none; color: white; transition: all 0.3s ease;">
                                        <i class="fas fa-search me-2"></i>Tìm Kiếm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Jobs Grid --}}
        <div class="row g-4">
            @foreach($jobs as $job)
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm job-card" style="border-radius: 20px; transition: all 0.3s ease;">
                    <div class="card-body p-4">
                        <a href="{{route('job.show', $job->slug)}}" class="text-decoration-none text-dark">
                            {{-- Company Header --}}
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="d-flex align-items-center flex-grow-1">
                                    <div class="position-relative me-3">
                                        <img src="{{asset('storage/'.$job->profile->profile_pic)}}" 
                                             class="rounded-3 border zoom-img" 
                                             style="width: 50px; height: 50px; object-fit: cover;" 
                                             alt="Company Logo">
                                        @if($job->profile->plan == "yearly")
                                            <i class="fas fa-check-circle position-absolute text-primary" 
                                               style="bottom: -5px; right: -5px; background: white; border-radius: 50%;"></i>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-1">{{$job->profile->name}}</h6>
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-map-marker-alt me-1"></i>{{$job->address}}
                                        </p>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-danger border-0">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>

                            {{-- Job Title --}}
                            <h5 class="fw-bold mb-2">{{$job->title}}</h5>
                            
                            {{-- Job Description --}}
                            <p class="text-muted small mb-3" style="height: 60px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                {{$job->predes}}
                            </p>

                            {{-- Job Details --}}
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @if($job->job_type == 'Fulltime')
                                    <span class="badge bg-primary rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>{{$job->job_type}}
                                    </span>
                                @elseif($job->job_type == 'Parttime')
                                    <span class="badge bg-dark rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>{{$job->job_type}}
                                    </span>
                                @elseif($job->job_type == 'Từ Xa')
                                    <span class="badge bg-info rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>{{$job->job_type}}
                                    </span>
                                @elseif($job->job_type == 'Hợp Đồng')
                                    <span class="badge bg-danger rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>{{$job->job_type}}
                                    </span>
                                @endif
                            </div>

                            {{-- Salary --}}
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-bold text-success">
                                    <i class="fas fa-coins me-1"></i>
                                    @if(is_numeric($job->salary))
                                        @if(strlen($job->salary) > 7)
                                            {{number_format(substr($job->salary, 0, -6))}} Tr VNĐ
                                        @else
                                            {{number_format($job->salary)}} VNĐ
                                        @endif
                                    @else
                                        Thỏa Thuận
                                    @endif
                                </div>
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>{{$job->created_at->diffForHumans()}}
                                </small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            @if($search || $address || $jobType || $salaryRange)
                {{$jobs->appends(['search' => $search, 'address' => $address, 'job_type' => $jobType, 'salary_range' => $salaryRange])->links('vendor.pagination.bootstrap-5')}}
            @else
                {{$jobs->links('vendor.pagination.bootstrap-5')}}
            @endif
        </div>
    </div>
</section>

<style>
.job-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23000" opacity="0.02"/><circle cx="75" cy="75" r="1" fill="%23000" opacity="0.02"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}

.min-vh-70 {
    min-height: 70vh;
}

@media (max-width: 768px) {
    .display-3 {
        font-size: 2.5rem;
    }
    
    .hero-section {
        min-height: 60vh;
    }
}

.btn-gradient:hover {
    background: linear-gradient(135deg, #0284c7, #7c3aed) !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(14, 165, 233, 0.3);
}
</style>
@endsection
