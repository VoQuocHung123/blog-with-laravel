
	<!-- 
	<section class="blog-list px-5 py-5 p-md-5">		 
		<div class="container">
			@if( !$posts->count() )
			Không có bài viết nào!!!

			@else
			@foreach( $posts as $post )
			@if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
			@if($post->active == '1')
			<button class="btn" style="float: right; border: 1px solid; background-color:; color:#F20B16; " ><a href="{{ url('edit/'.$post->slug)}}">Sửa Bài </a></button>

			@else
			<button class="btn" style="float: right; border: 1px solid; background-color:; color:#F20B16; " ><a href="{{ url('edit/'.$post->slug)}}">Sửa Bài </a></button>
			@endif
			@endif
			<div class="item mb-5">
				<div class="media">	
					<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{ url('/FontEnd/images/blog/blog-post-thumb-1.jpg') }}" alt="image">
					<div class="media-body">
						<h3 class="title mb-1"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a></h3>
						<div class="meta mb-1"><span class="date">{{ $post->created_at->format('M d,Y \a\t h:i a') }}</span><span class="time"><a "href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></span><span class="comment"><a href="#">	</a></span></div>
						<div class="intro">{!! Str::limit($post->body, $limit = 600, $end = '....... ') !!}</div>
						<a class="more-link" href="{{ url('/'.$post->slug) }}">Đọc thêm</a>
					</div>
				</div>
			</div>
			@endforeach
			<div class ="container" style=" margin-left:270px;">


				<div class="text-xs-center">
					<ul class="pagination">
						<li>	{!! $posts->render() !!}</li> 
					</ul>
				</div>
			</div>
			@endif
			
		</div>    
	</section>
	<footer class="footer text-center py-2 theme-bg-dark">

		<small class="copyright">Liên Hệ Quảng Cáo <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Hiếu Hùng Kiên</small>

		</footer>

	</div>


	du lieu -->