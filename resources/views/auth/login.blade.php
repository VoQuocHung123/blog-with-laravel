
@extends('Frame.themes')
<head>

    <!-- --------------------------- css login ----------------------------------------------- >
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->  
        <link rel="icon" type="image/png" href="{{ url('/ThemeDangNhap/images/icons/favicon.ico')}}"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/vendor/animsition/css/animsition.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/vendor/daterangepicker/daterangepicker.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('/ThemeDangNhap/css/main.css')}}">

    </head> 

    
    <div class="main-wrapper">
        
        
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form validate-form p-l-55 p-r-55 p-t-150"> 
                        <form method="POST" action="{{ route('login') }}">  
                         @csrf
                         <span class="login100-form-title">
                            ĐĂNG NHẬP
                        </span>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input class="input100" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email" autofocus> 
                            
                        </div>                 
                        <div class="wrap-input100 validate-input" data-validate = "Please enter password" class="form-control ">
                            <input class="input100" type="password" name="password" required autocomplete="current-password" placeholder="Mật khẩu">
                            
                        </div>

                        <div class="text-right p-t-13 p-b-23">                    
                            <a href="{{ route('password.request') }}" title=""><span class="txt1">
                            Quên mật khẩu</span></a>
                        </div>

                        <div class="container-login100-form-btn">
                            <button  type ="submit" class="login100-form-btn">
                                Đăng nhập
                            </button>

                            @error('email')
                            
                            <strong>{{ $message }}</strong>
                            
                            @enderror  

                            @error('password')
                            
                            <strong>{{ $message }}</strong>
                            
                            @enderror
                        </div>
                        <div class="flex-col-c p-t-170 p-b-40">
                            
                            <a href="{{route('register')}}" class="txt3">
                             Đăng Ký
                         </a>
                     </div>
                     
                     
                 </form>
                 
             </div>
         </div>
     </div>

 </section>
</div>
</div>        

<!--===============================================================================================-->
<script src="{{ url('/ThemeDangNhap/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ url('/ThemeDangNhap/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ url('/ThemeDangNhap/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{ url('/ThemeDangNhap/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ url('/ThemeDangNhap/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ url('/ThemeDangNhap/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{ url('/ThemeDangNhap/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ url('/ThemeDangNhap/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{ url('/ThemeDangNhap/js/main.js')}}"></script>



<!--//main-wrapper-->


