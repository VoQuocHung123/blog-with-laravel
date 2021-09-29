@extends('Frame.themes')


</style>
<div class="main-wrapper" style="margin-top: 15px;">
		




	@if($post)
	<div style=" width:100%; margin: auto; padding-left: px; ">
		<div style="width: 93%;  word-wrap: break-word; margin-left: 30px;  ">	
			<div  ><h3 class="title mb-2">	{{ $post->title }}</h3>
				</div>
				<div style=" width: 75%; height:50px;  ">
					<span class="date">
						 Ngày đăng: {{ $post->created_at->format('Y-m-d') }} 
					</span> --- Người Đăng Bài:  <a  href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a><span </span>
						@if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
						<button class ="btn" style=" float: right; border :2px solid;"><a href="{{ url('edit/'.$post->slug)}}">Sửa Bài</a></button>

					</div>	
					</div>			

							
				</div>


				@endif
				@else

				@endif	

				<div class="container" style=" width:74%; border-bottom:3px solid #22F212; height: 18px;  "></div>
				<article class="blog-post px-3 py-5 p-md-4">


					@if($post)

					<div>
						{!! $post->body !!}
					</div>

					<div class="container" style=" width:74%; border-top: 3px solid #22F212; height: 30px; ">			</div>	
					@if(Auth::guest())
					<p>Đăng nhập để nhận xét</p>
					@else
					<div class="panel-body" style="width: 85%;">
						<form  action="comment/add" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="on_post" value="{{ $post->id }}">
							<input type="hidden" name="slug" value="{{ $post->slug }}">
							<div class="form-group">
								<textarea required="required" placeholder="Nhận xét của bạn" name="body" class="form-control"></textarea>
							</div>
							<input type="submit" name='post_comment' class="btn btn-success" value="Post" />
						</form>
					</div>
					@endif
					<div>
						@if($comments)
						<ul style="list-style: none; padding: 0">
							@foreach($comments as $comment)
							<li class="panel-body">
								<div class="list-group">
									<div class="list-group-item">
										<h5>{{ $comment->author->name }}</h5>
										<p style="font-size: 12pt;">{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
									</div>
									<div class="list-group-item">
										<p>{{ $comment->body }}</p>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
						@endif
					</div>
				</div>
			</div><!--//container-->
		</article>
		@else
		404 error
		@endif
	</div>

