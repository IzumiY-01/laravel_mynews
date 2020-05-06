<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //PHP/Laravel 14 
    protected $guarded = array('id');
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        );
    
    // Newsモデルに関連付けを行う PL17追記
    public function histories()
    {
      return $this->hasMany('App\History');

    }
}
