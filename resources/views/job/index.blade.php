<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>Danh Sách Bài Đăng</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
    <!-- Summernote CSS - Bootstrap 4 compatible -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    
    <!-- Datepicker CSS -->
    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.dashboard.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid py-4">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Quản lý tin tuyển dụng</h1>
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ auth()->user()->user_type == 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Quay về Dashboard
                        </a>
                    </div>
                </div>
                
                @include('layouts.dashboard.indexjob')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.dashboard.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal - Fixed for Bootstrap 5 -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Xác nhận đăng xuất</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn đăng xuất khỏi phiên làm việc hiện tại không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" onclick="confirmLogout()">Đăng Xuất</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa bài đăng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Cảnh báo:</strong> Bạn có chắc chắn muốn xóa bài đăng này không? Hành động này không thể hoàn tác.
                </div>
                <div id="jobInfo" class="mt-3">
                    <!-- Job info will be populated here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i> Xóa bài đăng
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden forms -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<form id="delete-form" method="GET" style="display: none;">
    <!-- Using GET method as per your route definition -->
</form>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

<!-- Summernote JS - Bootstrap 4 compatible -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!-- Datepicker JS -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

<script>
// Disable DataTables warnings globally
$.fn.dataTable.ext.errMode = 'none';

// Suppress console warnings
const originalConsoleWarn = console.warn;
console.warn = function(message) {
    if (typeof message === 'string' && message.includes('DataTables')) {
        return; // Suppress DataTables warnings
    }
    originalConsoleWarn.apply(console, arguments);
};

// Global variables
let deleteUrl = '';

// Logout function
function confirmLogout() {
    document.getElementById('logout-form').submit();
}

// Delete function - Updated to use your existing route
function confirmDelete() {
    if (deleteUrl) {
        // Using GET method as per your route: Route::get('job/{id}/delete', [PostJobController::class, 'destroy'])->name('job.delete');
        window.location.href = deleteUrl;
    }
}

// Show delete modal - Updated to use your route structure
function showDeleteModal(jobId, jobTitle) {
    deleteUrl = `{{ url('job') }}/${jobId}/delete`;
    
    // Populate job info
    document.getElementById('jobInfo').innerHTML = `
        <div class="card">
            <div class="card-body">
                <h6 class="card-title text-primary">${jobTitle}</h6>
                <p class="card-text"><small class="text-muted">ID: ${jobId}</small></p>
            </div>
        </div>
    `;
    
    if (typeof bootstrap !== 'undefined') {
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
}

// Quick actions - Updated to use your existing routes
function quickAction(action, jobId, jobSlug = null) {
    switch(action) {
        case 'view':
            if (jobSlug) {
                window.open(`{{ url('job/show') }}/${jobSlug}`, '_blank');
            }
            break;
        case 'edit':
            // Using your existing route: Route::get('job/{listing}/edit', [PostJobController::class, 'edit'])->name('job.edit');
            window.location.href = `{{ url('job') }}/${jobId}/edit`;
            break;
        case 'delete':
            // Get job title from the row (you might need to adjust this)
            const jobTitle = $(`tr[data-job-id="${jobId}"]`).find('.job-title').text() || 'Bài đăng này';
            showDeleteModal(jobId, jobTitle);
            break;
        case 'applicants':
            // Using your existing route: Route::get('applicants/{listing:slug}', [ApplicantController::class, 'view'])->name('applicants.view');
            if (jobSlug) {
                window.location.href = `{{ url('applicants') }}/${jobSlug}`;
            }
            break;
    }
}

// Initialize components
$(document).ready(function () {
    // Initialize DataTables with error suppression
    if ($.fn.DataTable && $('#dataTable').length) {
        try {
            $('#dataTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json",
                    "emptyTable": "Không có dữ liệu",
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi",
                    "infoFiltered": "(lọc từ _MAX_ bản ghi)",
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "loadingRecords": "Đang tải...",
                    "processing": "Đang xử lý...",
                    "search": "Tìm kiếm:",
                    "zeroRecords": "Không tìm thấy bản ghi nào",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Tiếp",
                        "previous": "Trước"
                    }
                },
                "pageLength": 25,
                "responsive": true,
                "order": [[ 1, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [-1] }
                ],
                "processing": false,
                "serverSide": false,
                "deferRender": true,
                "stateSave": false,
                "error": function(xhr, error, code) {
                    // Suppress error display
                    console.log('DataTable error suppressed');
                }
            });
        } catch (e) {
            console.log('DataTable initialization failed, continuing without DataTable features');
        }
    }
    
    // Initialize Summernote (if needed)
    if ($('#summernote').length) {
        try {
            $('#summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link']]
                ]
            });
        } catch (e) {
            console.log('Summernote initialization failed');
        }
    }
    
    if ($('#summernote2').length) {
        try {
            $('#summernote2').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link']]
                ]
            });
        } catch (e) {
            console.log('Summernote2 initialization failed');
        }
    }
    
    // Initialize Datepicker
    if ($("#datepicker").length) {
        try {
            $("#datepicker").datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                language: 'vi'
            });
        } catch (e) {
            console.log('Datepicker initialization failed');
        }
    }
    
    // Bootstrap version detection and component initialization
    if (typeof bootstrap !== 'undefined') {
        try {
            // Bootstrap 5
            const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            const dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl, {
                    autoClose: true
                });
            });
            
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        } catch (e) {
            console.log('Bootstrap components initialization failed');
        }
    }
    
    // Quick search functionality
    $('#quickSearch').on('keyup', function() {
        if ($.fn.DataTable.isDataTable('#dataTable')) {
            try {
                $('#dataTable').DataTable().search(this.value).draw();
            } catch (e) {
                // Fallback to simple table filtering
                const searchTerm = this.value.toLowerCase();
                $('#dataTable tbody tr').each(function() {
                    const rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(searchTerm));
                });
            }
        }
    });
    
    // Bulk actions - Simplified since you don't have bulk routes
    $('#selectAll').on('change', function() {
        $('.job-checkbox').prop('checked', this.checked);
        updateBulkActions();
    });
    
    $('.job-checkbox').on('change', function() {
        updateBulkActions();
    });
    
    function updateBulkActions() {
        const checkedCount = $('.job-checkbox:checked').length;
        const bulkActions = $('#bulkActions');
        
        if (checkedCount > 0 && bulkActions.length) {
            bulkActions.show();
            $('#selectedCount').text(checkedCount);
        } else if (bulkActions.length) {
            bulkActions.hide();
        }
    }
});

// Export functions - Simplified since you don't have export routes
function exportJobs(format) {
    alert('Chức năng xuất dữ liệu sẽ được cập nhật trong phiên bản tiếp theo.');
}

// Print function
function printTable() {
    window.print();
}

// Refresh page
function refreshPage() {
    location.reload();
}

// Navigate to create job page
function createNewJob() {
    window.location.href = '{{ route("job.create") }}';
}

// Navigate to job index
function viewAllJobs() {
    window.location.href = '{{ route("job.index") }}';
}

// Navigate to applicants
function viewApplicants() {
    window.location.href = '{{ route("applicants.index") }}';
}

// Search jobs
function searchJobs() {
    const searchTerm = $('#searchInput').val();
    if (searchTerm) {
        window.location.href = `{{ route("job.search") }}?q=${encodeURIComponent(searchTerm)}`;
    }
}
</script>

<!-- Print styles -->
<style media="print">
    .no-print, .btn, .dropdown, .pagination {
        display: none !important;
    }
    
    .table {
        font-size: 12px;
    }
</style>

</body>
</html>