<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use File;
use Storage;
use DB;
// note: use true and false for active posts in postgresql database
// here '0' and '1' are used for active posts because of mysql database

class PostController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */


  public function getSearch(Request $request)
  {
    return view('trangchu');
  }

  public function getSearchAjax(Request $request){
    if($request->get('query'))
    {
      $query = $request->get('query');
      $data = DB::table('posts')->where('title', 'LIKE', "%{$query}%")->where('active','1 ')->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="'. $row->slug .'">'.$row->title.'</a></li>
       ';
     }
     $output .= '</ul>';
     echo $output;
   }
 }

  // tìm kiếm
 public function timkiem(Request $request){

  $tukhoa = $_GET['tukhoa'];
  $posts=Posts::where('title','LIKE','%'.$tukhoa.'%')->where('active','1 ')->get();
  return view('timkiem')->with(compact('posts','tukhoa'));

}


  // trả về bài post 
public function index()
{
  $posts = Posts::where('active', '1')->orderBy('created_at', 'desc')->paginate(5);

  return view('trangchu')->withPosts($posts);
}

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */

  // tạo bài post

  public function create(Request $request)
  {
    // 
    if ($request->user()->can_post()) {
      return view('posts.create');
    } else {
      return redirect('/')->withErrors('Bạn không được cho phép đăng bài');
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  // lưu trữ bài post  

  public function store(PostFormRequest $request)
  {

    $post = new Posts();
    $post->title = $request->get('title');
    $post->body = $request->get('body');
    $post->slug = Str::slug($post->title);
    $post->summary = $request ->get('summary');
    
    if ($request->hasfile('file')) {
      $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);

            $post->images = $filename;
          } else {
            
            $post->images = '';
          }

          $duplicate = Posts::where('slug', $post->slug)->first();
          if ($duplicate) {
            return redirect('new-post')->withErrors('Tiêu đề đã tồn tại.')->withInput();
          }
          $post->author_id = $request->user()->id;
          if ($request->has('save')) {
            $post->active = 0;
            $message = 'Lưu Bài Ẩn Thành Công';
          } else {
            $post->active = 1;
            $message = 'Đăng Bài Thành Công';
          }
          $post->save();
          return redirect('edit/' . $post->slug)->withMessage($message);
        }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($slug)
  {
    $post = Posts::where('slug', $slug)->first();

    if ($post) {
      if ($post->active == false)
        return redirect('/')->withErrors('Không tìm thấy Page');
      $comments = $post->comments;
    } else {
      return redirect('/')->withErrors('Không tìm thấy Page');
    }
    return view('posts.show')->withPost($post)->withComments($comments);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request, $slug)
  {
    $post = Posts::where('slug', $slug)->first();
    if ($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
      return view('posts.edit')->with('post', $post);
    else {
      return redirect('/')->withErrors('Bạn không được truy cập');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    //
    $post_id = $request->input('post_id');
    $post = Posts::find($post_id);
    if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
      $title = $request->input('title');
      $slug = Str::slug($title);
      $duplicate = Posts::where('slug', $slug)->first();
      if ($duplicate) {
        if ($duplicate->id != $post_id) {
          return redirect('edit/' . $post->slug)->withErrors('Tiêu đề đã tồn tại.')->withInput();
        } else {
          $post->slug = $slug;
        }
      }
      if ($request->hasfile('file')) {
        $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);

            $post->images = $filename;
          } 

          $post->title = $title;
          $post->body = $request->input('body');
          $post->summary = $request->input('summary');
          if ($request->has('save')) {
            $post->active = 0;
            $message = 'Bài viết đã được lưu';
            $landing = 'edit/' . $post->slug;
          } else {
            $post->active = 1;
            $message = 'Đăng bài thành công';
            $landing = $post->slug;
          }
          $post->save();
          return redirect($landing)->withMessage($message);
        } else {
          return redirect('/')->withErrors('Bạn không được truy cập');
        }
      }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
    //
    $post = Posts::find($id);
    if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
      $post->delete();
      $data['message'] = 'Xóa thành công';
    } else {
      $data['errors'] = ' Lỗi Máy chủ';
    }

    return redirect('/')->with($data);
  }
}
/*
 $image = $data['image'];
    $extension = $images ->getClientOriginalExtension();
    $name = time().'_'.$images->getClientOrginalName();
    Strorage::disk('public')->put($name,File::get($images));
    $post ->images =$name;
 <div class="form-group">
    <input required="required" value="{{ old('summary') }}" placeholder="Nhập nội dung tóm tắt" type="text" name="summary" class="form-control" />
  </div>
  */