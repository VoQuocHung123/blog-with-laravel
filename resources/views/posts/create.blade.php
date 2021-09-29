@extends('Frame.themes')

<div  style="width: 90%; margin-left: 200px; padding: auto;" >


  <div class="container" style="margin-top: 50px; margin-bottom: 20px; border:6px inset #BBF37E;padding: 7px; background-color:#BAF9C4;">
    <h3 style="text-align: center; ">Đăng Bài Viết</h3>

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
    <form action="new-post" method="POST" enctype="multipart/form-data" autocomplete="off">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <hr>
        <h4>Tiêu Đề</h4>
        <hr>
      </div>
      <div class="form-group">

        <input required="required" value="{{ old('title') }}" placeholder="Nhập tiêu đề bài viết" type="text" name="title" class="form-control" />
      </div>
       <div class="form-group">
        <hr>
        <h4>Tóm Tắt</h4>
        <hr>
      </div>
      <div class="form-group">
        <input required="required" value="{{ old('summary') }}" placeholder="Nhập tiêu đề bài viết" type="text" name="summary" class="form-control" />
      </div>
      <div class="form-group">
        <hr>
        <h4>Hình Mô Tả</h4>
        <hr>
      </div>
      <div class="form-group">
        <input type ="file"  name="file" />
        </div>
      <div class="form-group">
        <hr>
        <h4>Nội Dung</h4>
        <hr>
      </div>
      <div class="form-group">
        <textarea name='body' class="form-control">{{ old('body') }}</textarea>
      </div>
      <input type="submit" name='publish' class="btn btn-success" value="Đăng Bài" onclick="return confirm('Bạn muốn Đăng Bài viết này!');"/>
      <input type="submit" name='save' class="btn btn-warning" value="Lưu Ẩn" onclick="return confirm('Bạn muốn Lưu Ẩn Bài này!');"/>
    </form>
  </div>


  
</div>
