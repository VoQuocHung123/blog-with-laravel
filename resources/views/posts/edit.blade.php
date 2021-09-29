@extends('Frame.themes')


<div  style="width: 90%; margin-left: 200px; padding: auto;" >
	<div class="container" style="margin-top: 50px; margin-bottom: 20px; border:6px inset #BBF37E;padding: 7px; background-color:#BAF9C4;">
		<h3 style="text-align: center; ">Cập Nhật Bài Viết</h3>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  </div>
  <div class="container" >


   <script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
   <script type="text/javascript">
    tinymce.init({
      selector: "textarea",
      plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
  </script>
  <form method="post" action='{{ url("/update") }}' enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
      @if (Session::has('message'))
      <hr>
    <div class="flash alert-info" style="text-align: center;">
      <p class="panel-body">
        <h5>{{ Session::get('message') }}</h5>
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
    <div class="form-group">     
      <div class="form-group">
        <hr>
        <h4>Tiêu Đề</h4>
        <hr>
      </div>
      <input required="required" placeholder="Nhập Tiêu Đề" type="text" name="title" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}" />
    </div>
    <div class="form-group">
      <div class="form-group">
        <hr>
        <h4>Tóm Tắt</h4>
        <hr>
      </div>    
      <input required="required" placeholder="Nhập Tiêu Đề" type="text" name="summary" class="form-control" value="@if(!old('summary')){{$post->summary}}@endif{{ old('summary') }}" />
    </div>
    <div class="form-group">
      <hr>
      <h4>Hình Mô Tả</h4>

      <hr>
      <input type ="file"  name="file"/>
    </div>
    <div class="form-group">

      <!---->   
      <img src="{{ asset('uploads/' . $post->images) }}" style="height: 150px; width: 150px;"/>
    </div>
    <div class="form-group">
      <hr>
      <h4>Nội Dung</h4>
      <hr>
    </div>
    <div class="form-group">
      <textarea name='body' class="form-control" style="height:300px;width: 100%;  " >
        @if(!old('body'))
        {!! $post->body !!}
        @endif
        {!! old('body') !!}
      </textarea>
    </div>
    @if($post->active == '1')
    <input type="submit" name='publish' class="btn btn-success" value="Cập nhật" onclick="return confirm('Bạn có chắc chắc muốn cập nhật Bài này!');" />
    @else
    <input type="submit" name='publish' class="btn btn-success" value="Công Khai" onclick="return confirm('Bạn có muốn Công Khai  Bài này!');"/>
    @endif
    <input type="submit" name='save' class="btn btn-default" value="Lưu Bài Ẩn" onclick="return confirm('Bạn có chắc chắc muốn Ẩn Bài này!');"/>
    <a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắc muốn xóa Bài này!');">Xóa bài</a>
  </form>
</div>
</div>









