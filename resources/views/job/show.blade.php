@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            <strong>Thành Công!</strong> {{session()->get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <img src="{{Storage::url($listing->feature_image)}}" style="width: 100%; height: 17vw;" alt="">

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center justify-content-md-start">
                <img class="border-1" style="margin-top: -3vw;border-radius: 100px; height: 150px; box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;" src="{{Storage::url($listing->profile->profile_pic)}}">
            </div>

            <div class="col-12 d-flex justify-content-center justify-content-md-start">
                <p class="mt-4" style="font-size: 35px; font-family: 'iCiel Gotham Medium', sans-serif;">{{$listing->profile->name}}</p>

                {{-- Check if user has yearly plan then add tick icon --}}
                @if(isset($user) && $user->plan == "yearly")
                    <i class="fa-solid fa-circle-check fa-xl d-flex align-items-center mx-3 mt-2" style="color: #5084dc"></i>
                @endif
            </div>
        </div>

        {{-- Content --}}
        <h1 class="fw-bold mt-5" style="font-family: Inter, sans-serif">{{$listing->title}}</h1>
        
        @if($listing->job_type == "Fulltime")
            <button class="btn btn-primary py-0" style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px">
                <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}}
            </button>
        @elseif($listing->job_type == "Parttime")
            <button class="btn btn-dark py-0" style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px">
                <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}}
            </button>
        @elseif($listing->job_type == "Từ Xa")
            <button class="btn btn-info py-0" style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px">
                <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}}
            </button>
        @elseif($listing->job_type == "Hợp Đồng")
            <button class="btn btn-danger py-0" style="height: 27px; border-radius: 4px; margin-right: 4px; font-size: 15px">
                <i class="fa-solid fa-calendar fa-xs"></i> {{$listing->job_type}}
            </button>
        @endif
        
        <button class="btn py-0" style="color:white;background-color: #ce9e3a;height: 27px; border-radius: 4px;font-size: 15px;margin-right: 4px;">
            <i class="fa-solid fa-location-dot fa-xs"></i> {{$listing->address}}
        </button>

        {{-- Display remaining days from current date to application_close_date --}}
        @if($listing->application_close_date < now())
            <button class="btn py-0" style="color:white;background-color: #535454;height: 27px; border-radius: 4px;font-size: 15px">
                <i class="fa-solid fa-clock fa-xs"></i> Đã Hết Hạn
            </button>
        @else
            <button class="btn btn-success py-0" style="height: 27px; border-radius: 4px;font-size: 15px">
                <i class="fa-solid fa-clock fa-xs"></i> còn {{now()->diffInDays($listing->application_close_date)}} ngày
            </button>
        @endif

        <p>{!!$listing->description!!}</p>
        <h4 style="font-family: Inter, sans-serif">Yêu Cầu:</h4>
        <p>{!! $listing->roles !!}</p>
        <p class="">Email liên hệ của công ty: <b>{{$listing->profile->email}}</b></p>

        <h5 class="fw-bold mt-4">Mức Lương:
            @if(is_numeric($listing->salary))
                {{number_format($listing->salary)}} vnđ
            @else
                {{$listing->salary}}
            @endif
        </h5>

        {{-- Applicants Statistics Section --}}
        @if(isset($applicants))
            <div class="row mb-4 mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-users mr-2"></i>
                                Thống Kê Ứng Viên
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <h3 class="text-primary">{{$applicants->count()}}</h3>
                                    <p class="text-muted">Tổng Ứng Viên</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <h3 class="text-success">{{$applicants->where('pivot.created_at', '>=', now()->subDays(7))->count()}}</h3>
                                    <p class="text-muted">Ứng Viên Tuần Này</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <h3 class="text-warning">{{$applicants->where('pivot.shortlisted', 1)->count()}}</h3>
                                    <p class="text-muted">Đã Shortlist</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <h3 class="text-info">{{$applicants->where('user_type', 'employee')->count()}}</h3>
                                    <p class="text-muted">Nhân Viên</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Contact email --}}
        @if(auth()->user())
            {{-- Check if $listing->users already has pivot table --}}
            @if(isset($applicants) && $applicants->contains(Auth::id()))
                <button class="btn btn-success mt-4" disabled>
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Đã Ứng Tuyển
                </button>
            @else
                @if($listing->user_id == auth()->user()->id)
                    <a href="{{route('job.edit', $listing->id)}}" class="btn btn-dark mt-4">
                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Sửa bài
                    </a>
                @endif

                @if(auth()->user()->user_type == "employee")
                    @if($listing->application_close_date < now())
                        <button class="btn btn-danger mt-4" disabled>
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Đã Hết Hạn
                        </button>
                    @else
                        <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#applyModal">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Ứng Tuyển
                        </button>
                    @endif
                @endif
            @endif
        @else
            @if($listing->application_close_date < now())
                <button class="btn btn-danger mt-4" disabled>
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Đã Hết Hạn
                </button>
            @else
                <button class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#applyModal2">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Ứng Tuyển
                </button>
            @endif
        @endif

        {{-- Apply confirmation modal --}}
        <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
            <form action="{{route('application.submit', [$listing->id])}}" method="POST">@csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="applyModalLabel">Thông Báo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Xác Nhận Ứng Tuyển Vị Trí: {{$listing->title}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                            <button type="submit" class="btn btn-primary">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="applyModal2" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModalLabel">Thông Báo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn Cần Đăng Nhập Để Ứng Tuyển Vị Trí: {{$listing->title}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
                        <a href="{{route('login')}}" class="btn btn-dark">Xác nhận</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
