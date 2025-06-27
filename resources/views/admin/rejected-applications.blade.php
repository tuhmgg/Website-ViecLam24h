@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="background-color: #FBF0D5; border-color: #FBF0D5; color: #3a3b45;">
            <i class="fas fa-arrow-left me-2"></i>Quay về Dashboard
        </a>
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
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách hồ sơ từ chối ({{ $applications->total() }})</h6>
                </div>
                <div class="card-body">
                    @if($applications->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Ứng viên</th>
                                        <th>Vị trí ứng tuyển</th>
                                        <th>Ngày ứng tuyển</th>
                                        <th>Ngày từ chối</th>
                                        <th>Xem CV</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $app)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold mb-0">{{ $app->applicant_name }}</p>
                                            <p class="text-muted mb-0">{{ $app->applicant_email }}</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.view-job', $app->listing_id) }}" class="font-weight-bold">
                                                {{ $app->job_title }}
                                            </a>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($app->application_date)->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge badge-danger">Đã từ chối</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.cv.view', $app->user_id) }}" 
                                               class="btn btn-info btn-sm" target="_blank" title="Xem CV">
                                                <i class="fas fa-file-pdf"></i> Xem CV
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('admin.application.approve', ['listing_id' => $app->listing_id, 'user_id' => $app->user_id]) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm" 
                                                            title="Duyệt lại hồ sơ" 
                                                            onclick="return confirm('Bạn có chắc muốn duyệt lại hồ sơ này?')">
                                                        <i class="fas fa-check"></i> Duyệt lại
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Phân trang -->
                        <div class="d-flex justify-content-center">
                            {{ $applications->links() }}
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-times-circle fa-3x text-danger mb-3"></i>
                            <h5 class="text-gray-500">Không có hồ sơ nào bị từ chối</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 