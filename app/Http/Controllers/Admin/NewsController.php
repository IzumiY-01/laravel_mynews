<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
  
    //追記
    public function add()
    {
        return view('admin.news.create');
    }
    
    //PHP/Laravel 13 追記
    public function create(Request $request){
        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
  
}
