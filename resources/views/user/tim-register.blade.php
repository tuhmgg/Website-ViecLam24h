@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-4">
            <div class="card shadow border-0" style="border-radius: 55px">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <form action="{{ route('store.tim') }}" method="POST">
                            @csrf

                            <div class="col-11 m-3 text-center">
                                <h2 class="fw-bold">Đăng Ký</h2>
                                <h2 class="fw-bold">Tìm Việc</h2>
                            </div>

                            {{-- Họ tên --}}
                            <div class="col-11 m-3">
                                <i class="fa-solid fa-user" style="position: absolute; right: 49px; margin-top: 11px; color: rgba(114,0,0,0.48);"></i>
                                <input type="text" name="name" class="form-control shadow-none" placeholder="Họ Tên" style="border-radius: 30px" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-11 m-3">
                                <i class="fa-solid fa-envelope" style="position: absolute; right: 48px; margin-top: 11px; color: rgba(114,0,0,0.48);"></i>
                                <input type="email" name="email" class="form-control shadow-none" placeholder="Email" style="border-radius: 30px" value="{{ old('email') }}">
                                <small class="text-muted">VD: ten@gmail.com</small>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-11 m-3">
                                <i class="fa-solid fa-lock" style="position: absolute; right: 50px; margin-top: 11px; color: rgba(114,0,0,0.48);"></i>
                                <input type="password" name="password" id="password" class="form-control shadow-none" placeholder="Mật khẩu" style="border-radius: 30px">
                                <small class="text-muted">Ít nhất 8 ký tự, 1 in hoa, 1 ký tự đặc biệt</small>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- Hiển thị mật khẩu --}}
                            <div class="col-11 m-3">
                                <input type="checkbox" onclick="togglePassword()" style="margin-left: 4px"> Hiển thị mật khẩu
                            </div>

                            {{-- Nút submit --}}
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
        const input = document.getElementById("password");
        input.type = input.type === "password" ? "text" : "password";
    }
</script>
@endsection

