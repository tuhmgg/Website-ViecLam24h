<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tìm kiếm việc làm 24h')</title>
    <link href="{{(asset('vendor/fontawesome-free/css/all.min.css'))}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
    <style>
        .shadow{
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
        }
        .border-1{
            border: 4px solid #ffffff !important;
        }

        /* Style cho các nút phân trang */
        .pagination .page-link {
            color: #fff;
            background: #B70C18;
            border-radius: 30px !important;
            margin: 0 5px;
            border: none;
        }

        /* Style khi hover vào nút */
        .pagination .page-link:hover {
            opacity: 0.8;
        }

        /* Style cho nút đang được active (trang hiện tại) */
        .pagination .page-item.active .page-link {
            color: #B70C18;
            background: #eee;
        }

        /* Style cho button previous/next */
        .pagination .page-link.prev,
        .pagination .page-link.next {
            padding: .5rem .75rem;
        }

        .pagination .page-link.prev i,
        .pagination .page-link.next i {
            font-size: 1rem;
        }

        /* Style cho phần text hiển thị số trang đang đứng */
        .pagination .page-item span.current {
            padding: 10px 15px;
            border-radius: 30px;
            margin: 0 5px;
            background: #eee;
        }

        .cardpre {
            transition: .3s ease-in-out;
        }

        .cardpre:hover {
            box-shadow: 0px 0px 100px -40px rgb(22, 60, 86);
            transform: scale(1.1);
        }

        .cardstand {
            transition: .3s ease-in-out;
        }

        .cardstand:hover {
            box-shadow: 0px 0px 60px -40px rgb(3, 3, 3);
            transform: scale(1.05);
        }
        .bgnew{position:fixed;top:0;left:0;right:0;bottom:0;z-index:-1;background-image:-webkit-gradient(linear, left bottom, right top, from(#6d327c), color-stop(#485DA6), color-stop(#00a1ba), color-stop(#00BF98), to(#36C486));background-image:-webkit-linear-gradient(left bottom, #6d327c, #485DA6, #00a1ba, #00BF98, #36C486);background-image:-o-linear-gradient(left bottom, #6d327c, #485DA6, #00a1ba, #00BF98, #36C486);background-image:linear-gradient(to right top, #6d327c, #485DA6, #00a1ba, #00BF98, #36C486);}

        /* Custom navbar styles */
        .navbar-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%) !important;
        }

        .navbar-purple .navbar-brand img {
            filter: brightness(0) invert(1);
        }

        .navbar-purple .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-purple .navbar-nav .nav-link:hover {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .navbar-purple .navbar-nav .nav-link.active {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }

        .navbar-purple .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.3);
        }

        .navbar-purple .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .btn-gradient-register {
            background: linear-gradient(135deg, #0ea5e9, #8b5cf6);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-gradient-register:hover {
            background: linear-gradient(135deg, #0284c7, #7c3aed);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.3);
            color: white;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-weight: 600;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            color: white;
        }

        /* Spacing adjustments */
        .navbar-nav {
            align-items: center;
        }

        .nav-menu-items {
            margin-right: 2rem;
        }

        @media (max-width: 991.98px) {
            .nav-menu-items {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-purple shadow sticky-top" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('homepage')}}">
            <img style="width: auto; height: 60px" src="{{asset('image/logo-vieclam24h.png')}}" alt="Tìm kiếm việc làm 24h">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <div class="nav-menu-items d-flex flex-column flex-lg-row">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}" href="{{ route('homepage') }}">Cơ hội việc làm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('help') ? 'active' : '' }}" href="{{route('help')}}">Hướng dẫn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">Liên Hệ</a>
                    </li>
                </div>
                @if(!Auth::check())
                    <li class="nav-item mx-lg-1 my-2 my-lg-0">
                        <a href="{{route('register')}}" class="btn btn-gradient-register mx-1 d-block">Đăng Ký</a>
                    </li>
                    <li class="nav-item mx-lg-1 my-2 my-lg-0">
                        <a href="{{route('login')}}" class="btn btn-login mx-1 d-block">Đăng Nhập</a>
                    </li>
                @endif
                @if(Auth::check())
                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <div class="dropdown">
                            @if(auth()->user()->profile_pic)
                            <img type="button" data-bs-toggle="dropdown" aria-expanded="false" class="rounded-circle border border-light" src="{{asset('storage/'.auth()->user()->profile_pic)}}" height="45" alt="">
                            @else
                                <img type="button" data-bs-toggle="dropdown" aria-expanded="false" class="rounded-circle border border-light" src="{{asset('img/undraw_profile.svg')}}" height="45" alt="">
                            @endif
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-4 grow">
                                <a class="dropdown-item" href="{{route('user.profile')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#c1a29b" class="bi bi-person-fill mx-2" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                    </svg>
                                    Cá Nhân
                                </a>
                                <a class="dropdown-item" href="{{route('dashboard')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#c1a29b" class="bi bi-gear-fill mx-2" viewBox="0 0 16 16">
                                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                                    </svg>
                                    Bảng điều khiển
                                </a>
                                @if(auth()->user()->user_type === 'employer')
                                    <a class="dropdown-item" href="{{route('subscribe')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#c1a29b" class="bi bi-rocket-takeoff-fill mx-2" viewBox="0 0 16 16">
                                            <path d="M12.17 9.53c2.307-2.592 3.278-4.684 3.641-6.218.21-.887.214-1.58.16-2.065a3.578 3.578 0 0 0-.108-.563 2.22 2.22 0 0 0-.078-.23V.453c-.073-.164-.168-.234-.352-.295a2.35 2.35 0 0 0-.16-.045 3.797 3.797 0 0 0-.57-.093c-.49-.044-1.19-.03-2.08.188-1.536.374-3.618 1.343-6.161 3.604l-2.4.238h-.006a2.552 2.552 0 0 0-1.524.734L.15 7.17a.512.512 0 0 0 .433.868l1.896-.271c.28-.04.592.013.955.132.232.076.437.16.655.248l.203.083c.196.816.66 1.58 1.275 2.195.613.614 1.376 1.08 2.191 1.277l.082.202c.089.218.173.424.249.657.118.363.172.676.132.956l-.271 1.9a.512.512 0 0 0 .867.433l2.382-2.386c.41-.41.668-.949.732-1.526l.24-2.408Zm.11-3.699c-.797.8-1.93.961-2.528.362-.598-.6-.436-1.733.361-2.532.798-.799 1.93-.96 2.528-.361.599.599.437 1.732-.36 2.531Z"/>
                                            <path d="M5.205 10.787a7.632 7.632 0 0 0 1.804 1.352c-1.118 1.007-4.929 2.028-5.054 1.903-.126-.127.737-4.189 1.839-5.18.346.69.837 1.35 1.411 1.925Z"/>
                                        </svg>
                                        Gói đăng ký
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form id="form-logout" action="{{route('logout')}}" method="post">@csrf
                                    <button id="logout" type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mx-2" style="color: #c1a29b"></i>
                                        Đăng Xuất
                                    </button>
                                </form>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<div class="mt-5"></div>

<!-- Footer mới - background tím, chữ trắng, canh đầu -->
<footer class="mt-auto py-4" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
    <div class="container">
        <div class="row text-start">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="text-white">Về chúng tôi</h5>
                <p class="text-white-50 small">Nền tảng tuyển dụng hàng đầu Việt Nam, kết nối ứng viên với nhà tuyển dụng một cách hiệu quả và nhanh chóng.</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="text-white">Liên hệ</h5>
                <p class="text-white-50 small mb-1">📧 contact@vieclam24h.vn</p>
                <p class="text-white-50 small mb-1">📞 1900 1234</p>
                <p class="text-white-50 small mb-0">📍 TP. Hồ Chí Minh</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="text-white">Theo dõi chúng tôi</h5>
                <div class="d-flex">
                    <a href="https://www.facebook.com/vieclam24h" class="text-white me-3" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.youtube.com/@MT_TinhocVP" class="text-white me-3" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://linkedin.com/company/vieclam24h" class="text-white me-3" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/vieclam24h" class="text-white" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 pt-3" style="border-top: 1px solid rgba(255,255,255,0.2);">
            <div class="col-12">
                <p class="text-start text-white-50 small mb-0">
                    © 2024 vieclam24h - Tìm kiếm việc làm 24h. Tất cả quyền được bảo lưu.
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Nút back to top -->
<button type="button" class="btn" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<script src="https://kit.fontawesome.com/5f924928fd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    // Xử lý nút back to top
    let mybutton = document.getElementById("btn-back-to-top");

    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    // Xử lý form logout
    let logout = document.getElementById('logout');
    let formLogout = document.getElementById('form-logout');
    if (logout) {
        logout.addEventListener('click', function() {
            formLogout.submit();
        });
    }

    // Xử lý vị trí scroll cho form tìm kiếm
    let searchForm = document.getElementById('searchForm');
    if (searchForm) {
        let scrollPosition = window.scrollY;

        searchForm.addEventListener('submit', () => {
            sessionStorage.setItem('scrollPosition', scrollPosition);
        });

        window.onload = function() {
            let storedPosition = sessionStorage.getItem('scrollPosition');
            if (storedPosition) {
                window.scrollTo(0, storedPosition);
                sessionStorage.removeItem('scrollPosition');
            }
        }
    }
</script>
</body>
</html>
