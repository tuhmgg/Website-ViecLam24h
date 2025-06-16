<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>Chỉnh Sửa Bài Đăng</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    
    <!-- Summernote CSS - Bootstrap 4 compatible -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    
    <!-- Datepicker CSS -->
    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
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
            @include('layouts.dashboard.editjob')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('layouts.dashboard.footer')
        <!-- End of Footer -->

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
                <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa bài đăng này không? Hành động này không thể hoàn tác.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Xóa</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden logout form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- Hidden delete form -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
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
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>

<!-- Summernote JS - Bootstrap 4 compatible -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!-- Datepicker JS -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

<script>
// Global variables for delete functionality
let deleteUrl = '';

// Logout function
function confirmLogout() {
    document.getElementById('logout-form').submit();
}

// Delete function
function confirmDelete() {
    if (deleteUrl) {
        document.getElementById('delete-form').action = deleteUrl;
        document.getElementById('delete-form').submit();
    }
}

// Show delete modal
function showDeleteModal(url) {
    deleteUrl = url;
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Initialize components
$(document).ready(function () {
    // Initialize Summernote with enhanced toolbar
    $('#summernote').summernote({
        height: 300,
        minHeight: 200,
        maxHeight: 500,
        placeholder: 'Nhập mô tả công việc...',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'italic', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                // Handle image upload if needed
                console.log('Image upload:', files);
            }
        }
    });
    
    $('#summernote2').summernote({
        height: 250,
        minHeight: 150,
        maxHeight: 400,
        placeholder: 'Nhập yêu cầu công việc...',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'italic', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });
    
    // Initialize Datepicker with Vietnamese locale
    $("#datepicker").datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        language: 'vi',
        startDate: new Date(),
        daysOfWeekDisabled: [0], // Disable Sundays if needed
        todayBtn: "linked"
    });
    
    // Initialize DataTables if present
    if ($.fn.DataTable) {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json"
            },
            "pageLength": 10,
            "responsive": true,
            "order": [[ 0, "desc" ]]
        });
    }
    
    // Bootstrap version detection and component initialization
    if (typeof bootstrap !== 'undefined') {
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
    }
    
    // Form validation
    $('form').on('submit', function(e) {
        let isValid = true;
        let errorMessage = '';
        
        // Check required fields
        $(this).find('[required]').each(function() {
            if (!$(this).val().trim()) {
                isValid = false;
                $(this).addClass('is-invalid');
                const fieldName = $(this).attr('name') || $(this).attr('id') || 'Trường';
                errorMessage += fieldName + ' là bắt buộc.\n';
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        
        // Check Summernote content
        if ($('#summernote').length && !$('#summernote').summernote('isEmpty')) {
            $('#summernote').removeClass('is-invalid');
        } else if ($('#summernote').length) {
            $('#summernote').addClass('is-invalid');
            isValid = false;
            errorMessage += 'Mô tả công việc là bắt buộc.\n';
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Vui lòng kiểm tra lại:\n' + errorMessage);
            return false;
        }
        
        // Show loading state
        $(this).find('button[type="submit"]').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...');
    });
    
    // Auto-save draft functionality (optional)
    let autoSaveTimer;
    $('input, textarea, select').on('input change', function() {
        clearTimeout(autoSaveTimer);
        autoSaveTimer = setTimeout(function() {
            // Implement auto-save logic here if needed
            console.log('Auto-saving draft...');
        }, 5000); // Auto-save after 5 seconds of inactivity
    });
    
    // Character counter for text areas
    $('textarea[maxlength]').each(function() {
        const maxLength = $(this).attr('maxlength');
        const counter = $('<small class="form-text text-muted char-counter">0/' + maxLength + ' ký tự</small>');
        $(this).after(counter);
        
        $(this).on('input', function() {
            const currentLength = $(this).val().length;
            counter.text(currentLength + '/' + maxLength + ' ký tự');
            
            if (currentLength > maxLength * 0.9) {
                counter.removeClass('text-muted').addClass('text-warning');
            } else {
                counter.removeClass('text-warning').addClass('text-muted');
            }
        });
    });
});

// Handle file uploads
function handleFileUpload(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const maxSize = 5 * 1024 * 1024; // 5MB
        
        if (file.size > maxSize) {
            alert('File quá lớn. Vui lòng chọn file nhỏ hơn 5MB.');
            input.value = '';
            return;
        }
        
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
        if (!allowedTypes.includes(file.type)) {
            alert('Định dạng file không được hỗ trợ. Vui lòng chọn file JPG, PNG, GIF hoặc PDF.');
            input.value = '';
            return;
        }
        
        // Show preview for images
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = $(input).siblings('.file-preview');
                if (preview.length) {
                    preview.html('<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">');
                }
            };
            reader.readAsDataURL(file);
        }
    }
}

// Prevent accidental page leave
window.addEventListener('beforeunload', function(e) {
    const forms = document.querySelectorAll('form');
    let hasUnsavedChanges = false;
    
    forms.forEach(function(form) {
        const formData = new FormData(form);
        // Check if form has been modified (implement your logic here)
        // This is a simplified check
        if (form.querySelector('input:not([type="hidden"]), textarea, select')) {
            hasUnsavedChanges = true;
        }
    });
    
    if (hasUnsavedChanges) {
        e.preventDefault();
        e.returnValue = '';
    }
});
</script>

</body>
</html>