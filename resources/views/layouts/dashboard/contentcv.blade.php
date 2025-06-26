<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-upload me-2"></i>Tải lên CV mới</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('user.cv.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="resume" class="form-label">Chọn file CV</label>
                            <input type="file" name="resume" id="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                            <div class="form-text">Hỗ trợ định dạng: PDF, DOC, DOCX (Tối đa 10MB)</div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-upload me-2"></i>Tải Lên CV
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>CV hiện tại</h5>
                </div>
                <div class="card-body">
                    @if(auth()->user()->resume)
                        <div class="row">
                            <div class="col-md-8">
                                <iframe class="w-100" src="{{asset('storage/'.auth()->user()->resume)}}" height="500" style="border: 1px solid #ddd; border-radius: 4px;"></iframe>
                            </div>
                            <div class="col-md-4">
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary" href="{{asset('storage/'.auth()->user()->resume)}}" target="_blank">
                                        <i class="fas fa-external-link-alt me-2"></i>Xem trong tab mới
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCvModal">
                                        <i class="fas fa-trash me-2"></i>Xóa CV
                                    </button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Chưa có CV nào</h5>
                            <p class="text-muted">Vui lòng tải lên CV để xem tại đây.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete CV Modal -->
<div class="modal fade" id="deleteCvModal" tabindex="-1" aria-labelledby="deleteCvModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCvModalLabel">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Xác nhận xóa CV
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa CV hiện tại không?</p>
                <p class="text-muted small">
                    <i class="fas fa-info-circle me-1"></i>
                    Hành động này không thể hoàn tác. CV sẽ bị xóa vĩnh viễn.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Hủy
                </button>
                <form action="{{ route('user.cv.delete') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>Xóa CV
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .note-insert {
        display: none!important;
    }
    .error {
        margin-top: 10px;
        color: red;
        font-size: 15px;
        font-weight: bold;
    }
    
    /* Custom styles for CV management */
    .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.2s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-2px);
    }
    
    .card-header {
        border-radius: 10px 10px 0 0 !important;
        border-bottom: none;
    }
    
    .btn {
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }
    
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .form-control {
        border-radius: 6px;
        border: 1px solid #ddd;
    }
    
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    
    iframe {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    /* Animation for empty state */
    .text-center.py-5 {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .col-md-4 {
            margin-bottom: 20px;
        }
        
        iframe {
            height: 400px !important;
        }
    }
</style>
