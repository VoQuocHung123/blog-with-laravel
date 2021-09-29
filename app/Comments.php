<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Tham chiếu đến bảng cơ sở dữ liệu
class Comments extends Model
{
  // nhận xét vào cơ sở dữ liệu
  protected $guarded = [];
 
  // người đã nhận xét

  public function author()
  {
    return $this->belongsTo('App\User', 'from_user');
  }
  
  // trả về commmetn
  public function post()
  {
    return $this->belongsTo('App\Posts', 'on_post');
  }
}
