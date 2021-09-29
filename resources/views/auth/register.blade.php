@extends('Frame.themes')

<head>
	<meta charset="utf-8">
	<style type="text/css">
		body {
    background:#333;
}
#login {
	-webkit-perspective: 1000px;
	-moz-perspective: 1000px;
	perspective: 1000px;
	margin-top:145px;
	margin-left:32%;
}

.login:hover {
	-webkit-transform: rotate(0);
	-moz-transform: rotate(0);
	transform: rotate(0);
}
.login article {
	
}
.login .form-group {
	margin-bottom:17px;
}
.login .form-control,
.login .btn {
	border-radius:0;
}
.login .btn {
	text-transform:uppercase;
	letter-spacing:3px;
}
.input-group-addon {
	
	border-radius:0;
	color:#fff;
	background:#f3aa0c;
	border:#f3aa0c;
}
.forgot {
	font-size:16px;
}
.forgot a {
	color:#333;
}
.forgot a:hover {
	color:#5cb85c;
}

.input-group-addon {
    border-radius: 0;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    color: #fff;
    background: #f3aa0c;
    border: #f3aa0c;
        border-right-color: rgb(243, 170, 12);
        border-right-style: none;
        border-right-width: medium;
}

	</style>
</head>
 <div class="main-wrapper">


       <div class="col-md-4 col-md-offset-4" id="login">
						<section id="inner-wrapper" class="login">
							<article>
								<form form method="POST" action="{{ route('register') }}">
									 @csrf
									<div class="form-group">
										<div class="btn btn-success btn-block">
											Đăng Ký
									</div>
									</div>
									<div class="form-group">
										
											
											<input type="text" class="form-control" placeholder="Tên" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                   
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
										</div>
									
									<div class="form-group">
										<div class="input-group">
											
											<input type="email" class="form-control" placeholder="Email Đăng Nhập" name="email" value="{{ old('email') }}" required autocomplete="email">
										</div>
										@error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
									</div>
									<div class="form-group">
										<div class="input-group">
											
											<input type="text" class="form-control" placeholder="Địa Chỉ" name="address" required autocomplete="address">
										
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											
											<input type="text" class="form-control" placeholder="Sở thích" name="favorite" required autocomplete="address">
										
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											
											<input type="password" class="form-control" placeholder="Mật khẩu" name="password" required autocomplete="new-password">
										
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											
											<input type="password" class="form-control" placeholder="Nhập lại mật khẩu" type="password" name="password_confirmation" required autocomplete="new-password">
										</div>
											@error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror 
									</div>
									  <button type="submit" class="btn btn-success btn-block">Submit</button>
								</form>
							</article>
						</section>
					</div>
		
 </div>

<script type="text/javascript">
	

</script>