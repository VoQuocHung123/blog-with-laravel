@extends('Frame.themes')




<div class="main-wrapper">

  <section class="cta-section theme-bg-light py-5" style="height: 200px; ">
    <div class="container text-center" >

      <h2 class="heading">CHÀO MỪNG MỌI NGƯỜI ĐẾN VỚI BLOG TIN TỨC</h2>
      <div class="intro">Cập nhật tin tức mỗi ngày cho mọi người</div>
      <form class="signup-form form-inline justify-content-center pt-3" method ="GET" action ="{{url('timkiem')}}">
        <div class="input-group">
          <div class="form-outline">
            <input type="search" autocomplete="off" id="country_name" class="form-control" name ="tukhoa" />
            <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
            <div  id="countryList" style=""><br>
            </div>
            
          </div>
          {{ csrf_field() }}
        </div>
      </form>
    </div>
  </section>



  <div style="padding-bottom:  15px;margin-left:300px; margin-top: 20px;">


    <span><h5>Kết quả tìm kiếm cho từ khóa: {{$tukhoa}} </h5></span>
   
  </div>
  @if( !$posts->count() )
  Không có bài viết nào!!!

  @else
  @foreach( $posts as $post )

  <div style="margin-top:30px;margin-bottom:30px;margin-left:100px; display: flex;width: 1000px;height: 230px; word-wrap: break-word;">
    <div style=" width:24%; height:100%; "><img src="{{ asset('uploads/' . $post->images) }}" style="height:225px;width:230px;"></div>
    <div style="width:78%;position:relative; padding: 10px; ">
      <div style="width:100%;font-size: 15pt;font-weight:bold;color: green "><h4><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</h4></a> </div>  
      <div style="width:100%; ">{{ $post->summary }}</div>
      <div style="margin-left:10px;position:absolute;bottom:0;left:0;  ">Người Đăng: <a href="{{ url('/user/'.$post->author_id)}}"> {{ $post->author->name }}</a>  --- Ngày Đăng: {{ $post->created_at->format('M d,Y \a\t h:i a') }}</div>
      <div style="position:absolute;bottom:0;right:0;  "><a href="{{ url('/'.$post->slug) }}"><button type="submit" class="btn btn-primary">Đọc Thêm</button></a>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
        @if($post->active == '1')
        <button class="btn" style="float: right; border: 1px solid; background-color:; color:#F20B16; " ><a href="{{ url('edit/'.$post->slug)}}">Sửa Bài </a></button>

        @else
        <button class="btn" style="float: right; border: 1px solid; background-color:; color:#F20B16; " ><a href="{{ url('edit/'.$post->slug)}}">Sửa Bài </a></button>
        @endif
        @endif
      </div>
    </div>  
  </div>
  <hr>
  @endforeach 



  <div class ="container" style=" padding:30px;margin-left:500px;">


    <div class="text-xs-center">
      <ul class="pagination">
        <li> </li> 
      </ul>
    </div>
  </div>
  @endif

</div>    
</section>
<footer class="text-center text-white" style="background-color: #f1f1f1;">

  <div class="container pt-4">

    <section class="mb-4">

      <a
      class="btn btn-link btn-floating btn-lg text-dark m-1"
      href="#!"
      role="button"
      data-mdb-ripple-color="dark"
      ><i class="fab fa-facebook-f"></i
        ></a>


        <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
          ></a>
          <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-google"></i
            ></a>
            <a href="{{ url('/') }}"><i class="fas fa-home fa-fw mr-2" style=""></i></a>
            <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-instagram"></i
              ></a>


              <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fab fa-linkedin"></i
                ></a>

                <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-github"></i
                  ></a>
                </section>

              </div>



              <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">

                © 2021 Công Nghệ Phầm Mềm:
                <a class="text-dark" href="">Hiếu Hùng Kiên</a>
              </div>
              <!-- Copyright -->
            </footer>



          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script>
            $(document).ready(function(){

   $('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var query = $(this).val(); //lấy gía trị ng dùng gõ
    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"POST", // phương thức gửi dữ liệu.
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#countryList').fadeIn();  
       $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
     }
   });
   }else{
    $('#countryList').fadeIn(); 
    $('#countryList').html("");
  }
});

   $(document).on('click', 'li', function(){  
    $('#country_name').val($(this).text());  
    $('#countryList').fadeOut();  
  });  

 });
</script>


