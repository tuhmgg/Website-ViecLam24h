@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Hàng 1: Thống kê về Tin tuyển dụng -->
    <div class="row">
        <!-- Tổng số tin tuyển dụng -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.all-jobs') }}" class="card-link">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tổng Tin Tuyển Dụng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJobs }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tin chờ duyệt -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.pending-jobs') }}" class="card-link">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Tin Chờ Duyệt</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingJobs }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tin đã duyệt -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.all-jobs', ['status' => 'approved']) }}" class="card-link">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tin Đã Duyệt</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approvedJobs }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tin bị từ chối -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.all-jobs', ['status' => 'rejected']) }}" class="card-link">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Tin Bị Từ Chối</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rejectedJobs }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Hàng 2: Thống kê về Người dùng và Hồ sơ -->
    <div class="row">
        <!-- Tổng số người dùng -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.users') }}" class="card-link">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Tổng Người Dùng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Hồ sơ chờ duyệt -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('admin.applications.pending') }}" class="card-link">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Hồ Sơ Chờ Duyệt</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingApplications }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

<style>
    .card-link {
        text-decoration: none;
        color: inherit;
    }
    .card-link .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        transition: transform 0.2s, box-shadow 0.2s;
    }
</style>
@endsection 