@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Chi tiết tin tuyển dụng</h1>
                <div>
                    <a href="{{ route('admin.all-jobs') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Quay lại danh sách
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <!-- Thông tin tin tuyển dụng -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin tin tuyển dụng</h6>
                    <div>
                        @if($job->status == 'pending')
                            <span class="badge badge-warning">Chờ duyệt</span>
                        @elseif($job->status == 'approved')
                            <span class="badge badge-success">Đã duyệt</span>
                        @elseif($job->status == 'rejected')
                            <span class="badge badge-danger">Bị từ chối</span>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="font-weight-bold text-primary">{{ $job->title }}</h5>
                            <p class="text-muted">ID: {{ $job->id }}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p><strong>Ngày đăng:</strong> {{ $job->created_at->format('d/m/Y H:i') }}</p>
                            <p><strong>Cập nhật lần cuối:</strong> {{ $job->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    @if($job->feature_image)
                    <div class="row mb-3">
                        <div class="col-12">
                            <img src="{{ asset('storage/' . $job->feature_image) }}" 
                                 alt="Feature Image" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Mô tả ngắn:</strong></p>
                            <p>{{ $job->predes }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Loại công việc:</strong> {{ $job->job_type }}</p>
                            <p><strong>Địa chỉ:</strong> {{ $job->address }}</p>
                            <p><strong>Lương:</strong> {{ $job->salary }}</p>
                            <p><strong>Hạn nộp hồ sơ:</strong> {{ \Carbon\Carbon::parse($job->application_close_date)->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p><strong>Mô tả chi tiết:</strong></p>
                            <div class="border p-3 bg-light">
                                {!! nl2br(e($job->description)) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <p><strong>Vai trò và trách nhiệm:</strong></p>
                            <div class="border p-3 bg-light">
                                {!! nl2br(e($job->roles)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Thông tin người đăng -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin người đăng</h6>
                </div>
                <div class="card-body">
                    @if($job->profile)
                        <p><strong>Tên:</strong> {{ $job->profile->name }}</p>
                        <p><strong>Email:</strong> {{ $job->profile->email }}</p>
                        <p><strong>Ngày tham gia:</strong> {{ $job->profile->created_at->format('d/m/Y') }}</p>
                    @else
                        <p class="text-muted">Không có thông tin người đăng</p>
                    @endif
                </div>
            </div>

            <!-- Thao tác -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thao tác</h6>
                </div>
                <div class="card-body">
                    @if($job->status == 'pending')
                        <form action="{{ route('admin.approve-job', $job->id) }}" method="POST" class="mb-2">
                            @csrf
                            <button type="submit" class="btn btn-success btn-block" 
                                    onclick="return confirm('Bạn có chắc muốn duyệt tin này?')">
                                <i class="fas fa-check"></i> Duyệt tin
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.reject-job', $job->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block" 
                                    onclick="return confirm('Bạn có chắc muốn từ chối tin này?')">
                                <i class="fas fa-times"></i> Từ chối tin
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.reset-job', $job->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-block" 
                                    onclick="return confirm('Bạn có chắc muốn đặt lại tin này về trạng thái chờ duyệt?')">
                                <i class="fas fa-undo"></i> Đặt lại về chờ duyệt
                            </button>
                        </form>
                    @endif

                    <hr>
                    
                    <a href="{{ route('job.show', $job->slug) }}" class="btn btn-info btn-block" target="_blank">
                        <i class="fas fa-external-link-alt"></i> Xem tin công khai
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 