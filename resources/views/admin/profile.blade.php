@extends('Frame.themes')

<div class = "main-wrapper" style="  margin-top: 20px; ">  


	<div  style="width: 90%; margin: auto; padding: auto;">


		<ul class="list-group" style="margin-top:20px; border:6px inset #BBF37E;padding: 7px;">
			<div class="panel-heading" style="border-bottom:1px solid;">
				<h4>THÔNG TIN</h4>
			</div>
			<li class="list-group-item panel-body" >
					
				
				<table class="table-padding">
					<style>
						.table-padding td {
							padding: 3px 8px;
						}
					</style>
					<tr>
						<td>Tên: </td>
						<td> {{ $user->name }}</td>
						
					</tr>
					<tr>
						<td>Tham Gia:</td>
						<td>{{$user->created_at->format('Y-m-d') }}</td>
					</tr>
					<tr>
						<td>Email: </td>
						<td> {{ $user->email }}</td>
						
					</tr>
					<tr>
						<td>Địa Chỉ: </td>
						<td> {{$user->address}}</td>
						
					</tr>
					<tr>
						<td>Sở thích: </td>
						<td>{{$user ->favorite}}</td>
							
					</tr>
				</table>
			</li>
			<li class="list-group-item panel-body" >
				<table class="table-padding">
					<style>
						.table-padding td {
							padding: 3px 8px;
						}
					</style>
					<tr>
						<td>Bài Viết:</td>
						<td> {{$posts_count}}</td>
						@if($author && $posts_count)
						<td><a href="{{ url('/my-all-posts')}}">Xem</a></td>
						@endif
					</tr>
					<tr>
						<td>Bài Viết công khai:</td>
						<td>{{$posts_active_count}}</td>
						@if($posts_active_count)
						<td><a href="{{ url('/user/'.$user->id.'/posts')}}">Xem</a></td>
						@endif
					</tr>
					<tr>
						<td>Bài Viết ẩn:</td>
						<td>{{$posts_draft_count}}</td>
						@if($author && $posts_draft_count)
						<td><a href="{{ url('my-drafts')}}">Xem</a></td>
						@endif
					</tr>
					<tr>
						<td>Nhận Xét:</td>
						<td>{{$comments_count}}</td>
					</tr>
				</table>
			</li>
			<li class="list-group-item">

			</li>
		</ul>

		<div class="panel panel-default" style="border:6px inset ; padding: 7px; margin-top: 30px;">
			<div class="panel-heading" style="border-bottom:1px solid;">
				<h4>BÀI VIẾT CÔNG KHAI</h4>
			</div>
			<div class="panel-body">
				@if(!empty($latest_posts[0]))
				@foreach($latest_posts as $latest_post)
				<p>
					<strong><a href="{{ url('/'.$latest_post->slug) }}">{{ $latest_post->title }}</a></strong>
					<span class="well-sm">On {{ $latest_post->created_at->format('Y-m-d') }}</span>
				</p>
				@endforeach
				@else
				<p>Bạn chưa có bài viết nào.</p>
				@endif
			</div>
		</div>
		<div class="panel panel-default" style="margin-top:20px; border:6px inset ;padding: 7px;">
			<div class="panel-heading" style="border-bottom:1px solid;">
				<h4>NHẬN XÉT</h4>
			</div>
			<div class="list-group" >
				@if(!empty($latest_comments[0]))
				@foreach($latest_comments as $latest_comment)
				<div class="list-group-item"style="margin:10px">
					<p>{{ $latest_comment->body }}</p>
					<p>Nhận xét vào lúc: {{ $latest_comment->created_at->format('y-m-d') }}</p>
					<p>Trên bài viết <a href="{{ url('/'.$latest_comment->post->slug) }}">{{ $latest_comment->post->title }}</a></p>
				</div>
				@endforeach
				@else
				<div class="list-group-item">
					<p>Chưa có nhận xét</p>
				</div>
				@endif
			</div>

		</div>
	</div>
</div>
