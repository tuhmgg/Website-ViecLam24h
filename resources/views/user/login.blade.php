@extends('layouts.app')

@section('content')
{{----}}
{{--message error--}}
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
        {{session()->get('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="container mt-5">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-4">
                <div class="card shadow border-0" style="border-radius: 55px">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <form action="{{ route('login.post') }}" method="post">@csrf
                                <div class="col-11 m-3 text-center">
                                    <h2 class="fw-bold">Đăng Nhập</h2>
                                    <h2 class="fw-bold">Việc Làm 24h</h2>
                                </div>
                                <div class="col-11 m-3">
                                    <input type="email" name="email" id="email" class="form-control shadow-none" placeholder="Email" style="border-radius: 30px" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <p class="text-danger">Bạn chưa nhập email</p>
                                    @endif
                                </div>
                                <div class="col-11 m-3">
                                    <input type="password" name="password" id="password" class="form-control shadow-none" placeholder="mật Khẩu" style="border-radius: 30px" value="">
                                    @if($errors->has('password'))
                                        <p class="text-danger">Bạn chưa nhập password</p>
                                    @endif
                                </div>
                                <div class="col-11 m-3">
                                    <input class="mt-2 " type="checkbox"  onclick="show1()"> Hiển Thị
                                </div>
                                <div class="col-11 m-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary container-fluid" style="border-radius: 40px" >Đăng Nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function show1() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function show2() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
