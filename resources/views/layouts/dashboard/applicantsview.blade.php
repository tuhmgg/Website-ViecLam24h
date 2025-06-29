<div class="container-fluid">

    <div class="row">
        <div class="col-md-7 col-12">  <h1 class="h3 mb-2 text-gray-800">Danh sách ứng viên cho: <b> {{$listing->title}} </b></h1></div>

        <div class="col-md-5 col-12 d-flex justify-content-md-end" aria-label="Basic checkbox toggle button group">
           <p class="mr-2">Chế độ hiển thị  </p>
            <div  role="group" aria-label="Basic checkbox toggle button group">
                <input  type="checkbox" autocomplete="off" id="checkbox1" checked>
                <label  for="btncheck1">Đã thêm</label>

                <input type="checkbox" class="btn-check ml-3" id="checkbox2" checked>
                <label class="" for="btncheck2">Chưa thêm</label>
            </div>
        </div>
    </div>


    <div class="dropdown-divider"></div>
@if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
@endif

    <div class="row" >
    @foreach($users as $user)

                @if($user->pivot->application_status == 'approved' && $user->pivot->shortlisted == '1')
                <div class="col-lg-6 col-xl-4  no mt-4">
                    <div class="card bg border-bottom-success  pt-2 mt-4 div_box" >
                @elseif($user->pivot->application_status == 'approved' && $user->pivot->shortlisted != '1')
                <div class="col-lg-6 col-xl-4  yes mt-4">
                    <div class="card bg border-bottom-info shadow  pt-2 mt-4" >
                @elseif($user->pivot->application_status == 'pending')
                <div class="col-lg-6 col-xl-4  pending mt-4">
                    <div class="card bg border-bottom-warning shadow  pt-2 mt-4" >
                @elseif($user->pivot->application_status == 'rejected')
                <div class="col-lg-6 col-xl-4  rejected mt-4">
                    <div class="card bg border-bottom-danger shadow  pt-2 mt-4" >
                @else
                <div class="col-lg-6 col-xl-4  yes mt-4">
                    <div class="card bg border-bottom-primary shadow  pt-2 mt-4" >
                @endif
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-12 d-flex justify-content-center">
                                @if($user->profile_pic)
                                    <img class="img-profile rounded-circle " src="{{asset('storage/'.$user->profile_pic)}}" alt="" width="150px" height="150px">
                                @else
                                    <img class="img-profile rounded-circle " src="{{asset('img/undraw_profile.svg')}}" alt="" width="150px" height="150px">
                                @endif
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="text font-weight-bold text-primary text-uppercase mt-3 mr-2">
                                        ứng viên:</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3 d-flex">{{$user->name}}</div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="text font-weight-bold text-primary text-uppercase mt-3 mr-2">
                                        Email:</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3">{{$user->email}}</div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="text font-weight-bold text-primary text-uppercase mt-3 mr-2">
                                        ứng tuyển:</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-3">{{$user->pivot->created_at->format('d/m/Y')}}</div>
                                </div>

                                {{-- Hiển thị trạng thái --}}
                                <div class="col-12 d-flex justify-content-center mt-3">
                                    @if($user->pivot->application_status == 'pending')
                                        <span class="badge badge-warning">Chưa duyệt</span>
                                    @elseif($user->pivot->application_status == 'approved')
                                        @if($user->pivot->shortlisted == '1')
                                            <span class="badge badge-success status-badge" data-user-id="{{$user->id}}">Đã thêm</span>
                                        @else
                                            <span class="badge badge-info status-badge" data-user-id="{{$user->id}}">Đã duyệt</span>
                                        @endif
                                    @elseif($user->pivot->application_status == 'rejected')
                                        <span class="badge badge-danger">Đã từ chối</span>
                                    @else
                                        <span class="badge badge-warning">Đang chờ</span>
                                    @endif
                                </div>

                                <div class="col-12 mt-4">
                                    {{-- Nút Xem CV --}}
                                    <div class="mb-2">
                                        <a class="btn btn-info btn-sm w-100" href="{{ asset('storage/'.$user->resume) }}" target="_blank">
                                            <i class="fas fa-file-pdf"></i> Xem CV
                                        </a>
                                    </div>

                                    {{-- Các nút thao tác --}}
                                    <div class="d-flex flex-column gap-1">
                                        {{-- Nút Thêm / Đã thêm - chỉ hiển thị cho ứng viên đã được duyệt --}}
                                        @if($user->pivot->application_status == 'approved')
                                            <form action="{{ route('applicant.shortlist', [$listing->id, $user->id]) }}" method="POST" class="shortlist-form" data-user-id="{{$user->id}}">
                                                @csrf
                                                @if($user->pivot->shortlisted == '1')
                                                    <button class="btn btn-dark btn-sm w-100" disabled>
                                                        <i class="fas fa-check"></i> Đã thêm
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-success btn-sm w-100">
                                                        <i class="fas fa-plus"></i> Thêm
                                                    </button>
                                                @endif
                                            </form>
                                        @endif
                                        
                                        {{-- Nút Từ chối - chỉ hiển thị cho ứng viên đã được duyệt --}}
                                        @if($user->pivot->application_status == 'approved' && $user->pivot->shortlisted != '1')
                                            <form action="{{ route('applicant.reject', [$listing->id, $user->id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn từ chối ứng viên này?');">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm w-100">
                                                    <i class="fas fa-times"></i> Từ chối
                                                </button>
                                            </form>
                                        @endif
                                        
                                        {{-- Nút Xóa --}}
                                        <form action="{{ route('applicants.remove', [$listing->id, $user->id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa ứng viên này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                                <i class="fas fa-trash"></i> Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
    @endforeach

    </div>
</div>

                <div class="row  mt-5 ml-1" >
                    <div class="col-12 d-flex  justify-content-center">
                        {{$users->links('vendor.pagination.bootstrap-5')}}
                    </div>
                </div>

<style>
.gap-1 {
    gap: 0.25rem;
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.btn-sm {
    font-size: 0.875rem;
    padding: 0.25rem 0.5rem;
}

.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
}

@media (max-width: 768px) {
    .col-lg-6.col-xl-4 {
        margin-bottom: 1rem;
    }
}

/* Ẩn/hiện các card dựa trên trạng thái */
.hidden {
    display: none !important;
}

/* Hiệu ứng fade cho việc ẩn/hiện */
.fade-in {
    animation: fadeIn 0.3s ease-in;
}

.fade-out {
    animation: fadeOut 0.3s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeOut {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(10px); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkbox1 = document.getElementById('checkbox1');
    const checkbox2 = document.getElementById('checkbox2');
    const checkbox3 = document.getElementById('checkbox3');
    
    // Lấy tất cả các card
    const addedCards = document.querySelectorAll('.no'); // Đã thêm (approved + shortlisted = true)
    const approvedCards = document.querySelectorAll('.yes'); // Đã duyệt (approved + shortlisted = false)
    const pendingCards = document.querySelectorAll('.pending'); // Chưa duyệt (pending)
    const rejectedCards = document.querySelectorAll('.rejected'); // Đã từ chối (rejected)
    
    function updateVisibility() {
        // Xử lý card đã thêm
        addedCards.forEach(card => {
            if (checkbox1.checked) {
                card.classList.remove('hidden');
                card.classList.add('fade-in');
            } else {
                card.classList.add('hidden', 'fade-out');
            }
        });
        
        // Xử lý card đã duyệt
        approvedCards.forEach(card => {
            if (checkbox2.checked) {
                card.classList.remove('hidden');
                card.classList.add('fade-in');
            } else {
                card.classList.add('hidden', 'fade-out');
            }
        });
        
        // Xử lý card chưa duyệt
        pendingCards.forEach(card => {
            if (checkbox3.checked) {
                card.classList.remove('hidden');
                card.classList.add('fade-in');
            } else {
                card.classList.add('hidden', 'fade-out');
            }
        });
        
        // Hiển thị thông báo nếu không có card nào được hiển thị
        const visibleCards = document.querySelectorAll('.col-lg-6.col-xl-4:not(.hidden)');
        const noDataMessage = document.getElementById('no-data-message');
        
        if (visibleCards.length === 0) {
            if (!noDataMessage) {
                const message = document.createElement('div');
                message.id = 'no-data-message';
                message.className = 'col-12 text-center mt-4';
                message.innerHTML = '<p class="text-muted">Không có ứng viên nào phù hợp với bộ lọc hiện tại.</p>';
                document.querySelector('.row').appendChild(message);
            }
        } else {
            if (noDataMessage) {
                noDataMessage.remove();
            }
        }
    }
    
    // Thêm event listeners
    checkbox1.addEventListener('change', updateVisibility);
    checkbox2.addEventListener('change', updateVisibility);
    checkbox3.addEventListener('change', updateVisibility);
    
    // Khởi tạo trạng thái ban đầu
    updateVisibility();
    
    // Thêm tooltip cho checkbox
    checkbox1.title = 'Hiển thị ứng viên đã được thêm vào danh sách';
    checkbox2.title = 'Hiển thị ứng viên đã được duyệt';
    checkbox3.title = 'Hiển thị ứng viên chưa được duyệt';
    
    // Xử lý form shortlist để thay đổi badge
    const shortlistForms = document.querySelectorAll('.shortlist-form');
    shortlistForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const userId = this.getAttribute('data-user-id');
            const statusBadge = document.querySelector(`.status-badge[data-user-id="${userId}"]`);
            const submitButton = this.querySelector('button[type="submit"]');
            
            if (statusBadge && submitButton) {
                // Thay đổi badge thành "Đã thêm"
                statusBadge.textContent = 'Đã thêm';
                statusBadge.classList.remove('badge-info');
                statusBadge.classList.add('badge-success');
                
                // Thay đổi nút thành "Đã thêm" và disable
                submitButton.innerHTML = '<i class="fas fa-check"></i> Đã thêm';
                submitButton.classList.remove('btn-success');
                submitButton.classList.add('btn-dark');
                submitButton.disabled = true;
                
                // Submit form thực sự
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: new URLSearchParams(new FormData(this))
                })
                .then(response => {
                    if (!response.ok) {
                        // Nếu có lỗi, khôi phục lại trạng thái cũ
                        statusBadge.textContent = 'Đã duyệt';
                        statusBadge.classList.remove('badge-success');
                        statusBadge.classList.add('badge-info');
                        submitButton.innerHTML = '<i class="fas fa-plus"></i> Thêm';
                        submitButton.classList.remove('btn-dark');
                        submitButton.classList.add('btn-success');
                        submitButton.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Khôi phục lại trạng thái cũ nếu có lỗi
                    statusBadge.textContent = 'Đã duyệt';
                    statusBadge.classList.remove('badge-success');
                    statusBadge.classList.add('badge-info');
                    submitButton.innerHTML = '<i class="fas fa-plus"></i> Thêm';
                    submitButton.classList.remove('btn-dark');
                    submitButton.classList.add('btn-success');
                    submitButton.disabled = false;
                });
            }
        });
    });
});
</script> 