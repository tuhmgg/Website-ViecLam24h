<nav class="navbar navbar-expand-lg navbar-dark sticky-top mb-4 shadow-sm" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <!-- Brand - Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{route('homepage')}}">
                <img src="{{asset('image/logo-vieclam24h.png')}}" alt="Logo" class="navbar-logo">
            </a>
            
            <!-- Vertical Divider (visible on desktop) -->
            <div class="navbar-divider d-none d-lg-block"></div>
        </div>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topbarNavDropdown" 
                aria-controls="topbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="topbarNavDropdown">
            <!-- Main Navigation -->
            <ul class="navbar-nav mr-auto">
                <!-- Dashboard -->
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt mr-1"></i>
                        <span>Bảng Điều Khiển</span>
                    </a>
                </li>

                @if(auth()->user()->user_type == 'employer')
                    <!-- Employer Menu -->
                    <li class="nav-item dropdown {{ request()->routeIs('job.*') || request()->routeIs('applicants.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="employerDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-briefcase mr-1"></i>
                            <span>Quản Lý Tuyển Dụng</span>
                        </a>
                        <div class="dropdown-menu shadow" aria-labelledby="employerDropdown">
                            <a class="dropdown-item {{ request()->routeIs('job.create') ? 'active' : '' }}" href="{{route('job.create')}}">
                                <i class="fas fa-pencil-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng Bài Mới
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('job.index') ? 'active' : '' }}" href="{{route('job.index')}}">
                                <i class="fas fa-folder fa-sm fa-fw mr-2 text-gray-400"></i>
                                Quản Lý Bài
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('applicants.index') ? 'active' : '' }}" href="{{route('applicants.index')}}">
                                <i class="fas fa-user-check fa-sm fa-fw mr-2 text-gray-400"></i>
                                Quản Lý Ứng Viên
                            </a>
                        </div>
                    </li>
                @endif

                @if(auth()->user()->user_type == 'employee')
                    <!-- Employee Menu -->
                    <li class="nav-item dropdown {{ request()->routeIs('user.cv') || request()->routeIs('create.cv')  ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="cvDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-alt mr-1"></i>
                            <span>Quản Lý CV</span>
                        </a>
                        <div class="dropdown-menu shadow" aria-labelledby="cvDropdown">
                            <a class="dropdown-item {{ request()->routeIs('user.cv') ? 'active' : '' }}" href="{{route('user.cv')}}">
                                <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                CV Của Bạn
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('create.cv') ? 'active' : '' }}" href="{{route('create.cv')}}">
                                <i class="fas fa-palette fa-sm fa-fw mr-2 text-gray-400"></i>
                                Trình Tạo CV
                            </a>
                        </div>
                    </li>
                @endif

                @if(auth()->user()->user_type == 'admin')
                    <!-- Admin Menu -->
                    <li class="nav-item dropdown {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shield-alt mr-1"></i>
                            <span>Quản Trị</span>
                        </a>
                        <div class="dropdown-menu shadow" aria-labelledby="adminDropdown">
                            <a class="dropdown-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Dashboard Admin
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('admin.pending-jobs') ? 'active' : '' }}" href="{{route('admin.pending-jobs')}}">
                                <i class="fas fa-clock fa-sm fa-fw mr-2 text-gray-400"></i>
                                Tin chờ duyệt
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('admin.all-jobs') ? 'active' : '' }}" href="{{route('admin.all-jobs')}}">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Tất cả tin tuyển dụng
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('admin.users') ? 'active' : '' }}" href="{{route('admin.users')}}">
                                <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                                Quản lý người dùng
                            </a>
                        </div>
                    </li>
                @endif

                <!-- AI Assistant -->
                <li class="nav-item {{ request()->routeIs('suggest.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('suggest.index')}}">
                        <i class="fas fa-magic mr-1"></i>
                        <span>Trợ Lý AI</span>
                    </a>
                </li>
                
                <!-- Settings -->
                <li class="nav-item {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.profile') }}">
                        <i class="fas fa-cog mr-1"></i>
                        <span>Cài Đặt</span>
                    </a>
                </li>
            </ul>

            <!-- Right-aligned items -->
            <ul class="navbar-nav ml-auto">
                <!-- User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-white">{{ auth()->user()->name }}</span>
                        @if(auth()->user()->plan == "yearly")
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-patch-check-fill mr-2" viewBox="0 0 16 16">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                        @endif
                        @if(auth()->user()->profile_pic)
                            <img class="img-profile rounded-circle border border-2 border-white"
                                src="{{ asset('storage/'.auth()->user()->profile_pic) }}" style="width: 40px; height: 40px; object-fit: cover;">
                        @else
                            <img class="img-profile rounded-circle border border-2 border-white"
                                src="{{ asset('img/undraw_profile.svg') }}" style="width: 40px; height: 40px; object-fit: cover;">
                        @endif
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <div class="px-4 py-3 border-bottom">
                            <h6 class="text-primary mb-0">{{ auth()->user()->name }}</h6>
                            <small class="text-muted">{{ auth()->user()->email }}</small>
                        </div>
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Cá Nhân
                        </a>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Bảng điều khiển
                        </a>
                        @if(auth()->user()->user_type === 'employer')
                            <a class="dropdown-item" href="{{ route('subscribe') }}">
                                <i class="fas fa-crown fa-sm fa-fw mr-2 text-gray-400"></i>
                                Gói đăng ký
                            </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" action="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đăng Xuất
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Xác nhận đăng xuất</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn đăng xuất khỏi phiên làm việc hiện tại không?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <button class="btn btn-primary" onclick="confirmLogout()">Đăng Xuất</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden logout form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
function confirmLogout() {
    // Submit logout form
    document.getElementById('logout-form').submit();
}
</script>

<style>
/* Navbar Styles */
.navbar {
    padding: 0 1rem;
    height: 70px;
}

.navbar-dark .navbar-brand {
    color: #fff;
    font-weight: 600;
    display: flex;
    align-items: center;
    height: 70px;
    padding: 0;
    margin-right: 0;
}

.navbar-logo {
    height: 40px;
    filter: brightness(0) invert(1);
}

/* Vertical divider between logo and navigation */
.navbar-divider {
    height: 40px;
    width: 1px;
    background-color: rgba(255, 255, 255, 0.5);
    margin: 0 1rem;
}

.navbar-dark .navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.85);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    font-weight: 500;
}

.navbar-dark .navbar-nav .nav-link:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
}

.navbar-dark .navbar-nav .nav-item.active .nav-link {
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    font-weight: 700;
}

/* Dropdown Styles */
.dropdown-menu {
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    border-radius: 0.5rem;
    padding: 0.5rem 0;
    margin-top: 0.5rem;
}

.dropdown-item {
    padding: 0.5rem 1.5rem;
    transition: all 0.2s ease;
}

.dropdown-item:hover {
    background-color: #B70C18 !important;
    transform: translateX(5px);
}

.dropdown-item.active {
    background-color: #e9ecef;
    color: #333;
    font-weight: 600;
}

/* User Profile */
.img-profile {
    transition: all 0.3s ease;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
}

.nav-link:hover .img-profile {
    transform: scale(1.1);
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.4);
}

/* Animation for dropdown */
.animated--grow-in {
    animation-name: growIn;
    animation-duration: 200ms;
    animation-timing-function: transform cubic-bezier(0.18, 1.25, 0.4, 1), opacity cubic-bezier(0, 1, 0.4, 1);
}

@keyframes growIn {
    0% {
        transform: scale(0.9);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .navbar {
        height: auto;
        padding: 0.5rem 1rem;
    }
    
    .navbar-collapse {
        padding: 1rem 0;
    }
    
    .navbar-dark .navbar-nav .nav-link {
        padding: 0.75rem 1rem;
        margin: 0.25rem 0;
    }
    
    .dropdown-menu {
        border: none;
        background-color: rgba(255, 255, 255, 0.05);
        box-shadow: none;
        margin-left: 1rem;
    }
    
    .dropdown-item {
        color: rgba(255, 255, 255, 0.85);
    }
    
    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    
    .dropdown-item.active {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }
    
    /* Add mobile-specific divider */
    .navbar-nav .nav-item:not(:last-child) {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
}
</style>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Đóng tất cả dropdown khi click outside
            document.addEventListener('click', function(event) {
                const dropdowns = document.querySelectorAll('.dropdown-menu.show');
                dropdowns.forEach(function(dropdown) {
                    if (!dropdown.closest('.dropdown').contains(event.target)) {
                        dropdown.classList.remove('show');
                        dropdown.previousElementSibling.setAttribute('aria-expanded', 'false');
                    }
                });
            });

            // Xử lý click trên dropdown toggle
            const dropdownToggle = document.getElementById('cvDropdown');
            if (dropdownToggle) {
                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const dropdownMenu = this.nextElementSibling;
                    const isShown = dropdownMenu.classList.contains('show');
                    
                    // Đóng tất cả dropdown khác
                    document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                        menu.classList.remove('show');
                        menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                    });
                    
                    // Toggle dropdown hiện tại
                    if (!isShown) {
                        dropdownMenu.classList.add('show');
                        this.setAttribute('aria-expanded', 'true');
                    }
                });
            }
        });
    </script>
    
