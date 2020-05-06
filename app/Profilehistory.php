<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profilehistory extends Model
{
    //テーブルを指定
    //protected $table ="";
    protected $guarded = array('id');
    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );
}
