@extends('layouts.app')

@section('title','Công việc đã lưu - Việc làm 24h')

@section('content')
<div class="container py-5">
    {{-- Back Button --}}
    <div class="mb-4">
        <a href="{{ route('homepage') }}" class="btn btn-save-toggle">
            <i class="fas fa-arrow-left me-2"></i>Quay Lại Trang Chính
        </a>
    </div>

    <h2 class="mb-4 fw-bold" style="color: #1f2937;">Công Việc Đã Lưu</h2>

    @if($favorites->count())
        <div class="row g-4">
            @foreach($favorites as $job)
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm job-card" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <a href="{{route('job.show', $job->slug)}}" class="text-decoration-none text-dark">
                                {{-- Company Header --}}
                                <div class="d-flex align-items-start justify-content-between mb-3">
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <div class="position-relative me-3">
                                            <img src="{{asset('storage/'.$job->feature_image)}}" 
                                                 class="rounded-circle border zoom-img" 
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

                                </div>

                                <h5 class="fw-bold mb-2">{{$job->title}}</h5>
                                <p class="text-muted small mb-3" style="height: 60px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    {{$job->predes}}
                                </p>

                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge bg-primary rounded-pill">
                                        <i class="fas fa-calendar me-1"></i>{{$job->job_type}}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="fw-bold text-success">
                                        <i class="fas fa-coins me-1"></i>
                                        @if(is_numeric($job->salary))
                                            {{number_format($job->salary)}} VNĐ
                                        @else
                                            Thoả Thuận
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
    @else
        <div class="alert alert-info text-center">
            Bạn chưa lưu công việc nào.
        </div>
    @endif
</div>

<script>
document.querySelectorAll('.favorite-toggle').forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault();
        const jobId = this.getAttribute('data-id');
        const icon = this.querySelector('i');

        fetch(`/favorites/${jobId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.favorited) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.classList.add('favorited');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.classList.remove('favorited');
            }
        });
    });
});
</script>
<style>
    /* Trạng thái mặc định (chưa nhấn) */
.btn-save-toggle {
    border: 2px solid black;
    color: black;
    background-color: white;
    transition: all 0.3s ease;
    padding: 8px 18px;
    font-weight: 600;
    border-radius: 25px;
}

/* Trạng thái đã chọn */
.btn-save-toggle.active {
    background-color: #8B0000; /* đỏ đô */
    color: white;
    border-color: #8B0000;
}

/* Hover cả hai trạng thái: giữ viền như cũ */
.btn-save-toggle:hover {
    border: 2px solid black; /* giữ viền đen */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    opacity: 0.95;
    color: black; /* giữ màu chữ nếu chưa active */
}

/* Hover khi đã active: màu trắng không bị đổi */
.btn-save-toggle.active:hover {
    color: white;
    border-color: #8B0000;
}

    .favorite-toggle {
    color: #ccc;
    border: 1px solid #ccc;
    background: #fff;
    transition: 0.3s ease;
    border-radius: 50px;
    padding: 6px 10px;
}

.favorite-toggle.favorited {
    color: #e63946;
    border-color: #e63946;
}

.favorite-toggle:hover {
    background: #f9f9f9;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
}

.btn-save-toggle {
    border: 2px solid #8B0000;
    color: black;
    background: white;
    transition: 0.3s ease;
    padding: 8px 16px;
    font-weight: 600;
    border-radius: 25px;
}

.btn-save-toggle.active {
    background: #8B0000;
    color: white;
}

.btn-save-toggle:hover {
    opacity: 0.9;
}

.mt-3, .mb-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
}

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
