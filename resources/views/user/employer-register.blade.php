@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-4">
                <div class="card shadow border-0" style="border-radius: 55px">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <form action="{{ route('store.employer') }}" method="post">@csrf
                                <div class="col-11 m-3 text-center">
                                    <h2 class="fw-bold">Đăng Ký</h2>
                                    <h2 class="fw-bold">Nhà Tuyển Dụng</h2>
                                </div>

                                {{-- Tên công ty --}}
                                <div class="col-11 m-3">
                                    <i class="fa-solid fa-building" style="position: absolute; right: 50px; margin-top: 11px; color: rgba(114,0,0,0.48);"></i>
                                    <input type="text" name="name" id="name" class="form-control shadow-none" placeholder="Tên Công Ty" style="border-radius: 30px" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-11 m-3">
                                    <i class="fa-solid fa-envelope" style="position: absolute; right: 48px; margin-top: 11px; color: rgba(114,0,0,0.48);"></i>
                                    <input type="email" name="email" id="email" class="form-control shadow-none" placeholder="Email" style="border-radius: 30px" value="{{ old('email') }}">
                                    <small class="text-muted">VD: ten@gmail.com</small>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Mật khẩu --}}
                                <div class="col-11 m-3">
                                    <i class="fa-solid fa-lock" style="position: absolute; right: 50px; margin-top: 11px; color: rgba(114,0,0,0.48);"></i>
                                    <input type="password" name="password" id="password" class="form-control shadow-none" placeholder="Mật khẩu" style="border-radius: 30px">
                                    <small class="text-muted">8+ ký tự, 1 in hoa, 1 ký tự đặc biệt</small>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Hiển thị mật khẩu --}}
                                <div class="col-11 m-3">
                                    <input type="checkbox" style="margin-left: 4px" onclick="togglePassword()"> Hiển Thị
                                </div>

                                {{-- Nút đăng ký --}}
                                <div class="col-11 m-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary container-fluid" style="border-radius: 40px">Đăng Ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const x = document.getElementById("password");
            x.type = (x.type === "password") ? "text" : "password";
        }
    </script>
@endsection
