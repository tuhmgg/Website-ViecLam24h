@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="background-color: #FBF0D5; border-color: #FBF0D5; color: #3a3b45;">
            <i class="fas fa-arrow-left me-2"></i>Quay về Dashboard
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách hồ sơ chờ duyệt ({{ $applications->total() }})</h6>
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
                                             <a href="{{ route('user.cv.view', ['user_id' => $app->user_id]) }}" 
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
                                                            title="Duyệt hồ sơ" 
                                                            onclick="return confirm('Bạn có chắc muốn duyệt hồ sơ này và gửi cho nhà tuyển dụng?')">
                                                        <i class="fas fa-check"></i> Duyệt
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.application.reject', ['listing_id' => $app->listing_id, 'user_id' => $app->user_id]) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            title="Từ chối hồ sơ" 
                                                            onclick="return confirm('Bạn có chắc muốn từ chối hồ sơ này?')">
                                                        <i class="fas fa-times"></i> Từ chối
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
                            <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-500">Không có hồ sơ nào chờ duyệt</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 