
<!DOCTYPE html>
<html lang="en"> 

<head>
    <title>Blogger HHK</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ url('/FontEnd/css/theme-1.css') }}">

</head> 

<body>
    <!-----------------------phan ben trai ----------------->
    <header class="header text-center">     


        <nav class="navbar navbar-expand-lg navbar-dark" >

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navigation" class="collapse navbar-collapse flex-column" >
                <div class="profile-section pt-3 pt-lg-0"><a href="{{ url('/') }}" title="">
                    <img class="profile-image mb-3 rounded-circle mx-auto" src="{{ url('/FontEnd/images/profile.png')}}" alt="image" ></a>            
                    @if (!Auth::guest())
                    <hr>
                    <p>Xin Chào, {{ Auth::user()->name }} </p>
                    

                    @endif
                    <hr> 
                </div><!--//profile-section-->

                <ul class="navbar-nav flex-column text-left">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home fa-fw mr-2"></i>Blog Trang Chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
                         <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                         <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                     </svg>   Liên Hệ</a>
                 </li>
                 @if (Auth::guest())
                 <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user fa-fw mr-2"></i>Đăng Nhập</a>
               </li>
               <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-bookmark fa-fw mr-2"></i>Đăng Ký</a>
            </li>
            @else

            @if (Auth::user()->can_post())
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/user/'.Auth::id()) }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                  <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                  <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>   Trang Cá Nhân</a>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/new-post') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
              <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z"/>
              <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z"/>
          </svg>   Đăng Bài</a>


      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user/'.Auth::id().'/posts') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
          <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"/>
          <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"/>
      </svg>   Bài Đăng</a>
  </li >
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/logout') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
      <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
  </svg>   Đăng Xuất</a>
</li>


@endif

</ul>

<div class="my-2 my-md-3">
    <a class="btn btn-primary" href="https://themes.3rdwavemedia.com/" target="_blank">Quảng Cáo</a>
</div>
</div>
</nav>
</header>
<!-----------------------phan ben trai ----------------->



<!-----------------------phan ben tren ----------------->
@section('footer')
<div class="main-wrapper">
    <section class="cta-section theme-bg-light py-5">
        <div class="container text-center">
            <h2 class="heading">Blog HHK Tin Tức Chia Sẻ </h2>
            <div class="intro">Welcome to my blog</div>
            @if (Session::has('message'))
    <div class="flash alert-info">
      <p class="panel-body">
        {{ Session::get('message') }}
      </p>
    </div>
    @endif
    @if ($errors->any())
    <div class='flash alert-danger'>
      <ul class="panel-body">
        @foreach ( $errors->all() as $error )
        <li>
          {{ $error }}
        </li>
        @endforeach
      </ul>
    </div>
    @endif

        </div><!--//container-->
    </section>
    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container">

          <!-- ghi gi do vao -->  

      </div>
  </section>

  <!-----------------------phan ben trai ----------------->






  <footer class="footer text-center py-2 theme-bg-dark">

   <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

</footer>

</div>
<!--//main-wrapper-->



<!-- Javascript -->          
<script src="{{ url('/FontEnd/plugins/jquery-3.3.1.min.js')}}"></script>
<script src="{{ url('/FontEnd/plugins/popper.min.js')}}"></script> 
<script src="{{ url('/FontEnd/plugins/bootstrap/js/bootstrap.min.js')}}"></script> 
<!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
<script src="{{ url('/FontEnd/js/demo/style-switcher.js')}}"></script>     

@endsection  
</body>
</html> 

