@extends('layouts.app')

@section('content')
{{----}}
   <div class="container mt-5">
       <div class="row d-flex justify-content-center mt-3">
           <div class="col-md-4">
               <div class="card shadow border-0" style="border-radius: 55px">
                   <div class="card-body">
                       <div class="row d-flex justify-content-center">
                           <form action="{{route('store.tim')}}" method="post">@csrf
                               <div class="col-11 m-3 text-center">
                                   <h2 class="fw-bold">Đăng Ký</h2>
                                   <h2 class="fw-bold">Tìm Việc</h2>
                               </div>
                               <div class="col-11 m-3">
                                   <i class="fa-solid fa-user" style="color: rgba(114,0,0,0.48);position: absolute; right: 49px; margin-top: 11px"></i>
                                   <input type="text" name="name" id="name" class="form-control shadow-none" placeholder="Họ Tên" style="border-radius: 30px" value="">
                                   @if($errors->has('name'))
                                       <p class="text-danger">Bạn chưa nhập Tên</p>
                                   @endif
                               </div>
                               <div class="col-11 m-3">
                                   <i class="fa-solid fa-envelope" style="color: rgba(114,0,0,0.48);position: absolute; right: 48px; margin-top: 11px"></i>
                                   <input type="email" name="email" id="email" class="form-control shadow-none" placeholder="Email" style="border-radius: 30px" value="">
                                   @if($errors->has('email'))
                                       <p class="text-danger">Bạn chưa nhập email</p>
                                   @endif
                               </div>
                               <div class="col-11 m-3">
                                   <i class="fa-solid fa-lock" style="color: rgba(114,0,0,0.48);position: absolute; right: 50px; margin-top: 11px"></i>
                                   <input type="password" name="password" id="password" class="form-control shadow-none" placeholder="mật Khẩu" style="border-radius: 30px" value="">
                                   @if($errors->has('password'))
                                       <p class="text-danger">Bạn chưa nhập password</p>
                                   @endif
                               </div>
                               <div class="col-11 m-3">
                                   <input type="checkbox" style="margin-left: 4px"  onclick="show()"> Hiển Thị
                               </div>
                               <div class="col-11 m-3 d-flex justify-content-center">
                                   <button type="submit" class="btn btn-primary container-fluid" style="border-radius: 40px" >Đăng Ký</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
<script>
    function show() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("re_password");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>
@endsection
