<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //テーブルを指定
    protected $table = "profile";
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );
    
    //Profileモデルに関連付け
    public function profilehistories()
    {
      return $this->hasMany('App\Profilehistory');

    }
}
