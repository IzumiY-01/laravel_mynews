<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php/Laravel 14追記
use App\News; //(News Modelが扱えるようになる)

class NewsController extends Controller
{
  
    //追記
    public function add()
    {
        return view('admin.news.create');
    }
    
    //PHP/Laravel 13 追記
    public function create(Request $request){
        //php/Laravel 14 Varidationを行う
        $this->validate($request, News::$rules);
        $news = new News;
        $form = $request->all();
        
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存するPL14
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        // フォームから送信されてきた_tokenを削除するPL14
        unset($form['_token']);
        // フォームから送信されてきたimageを削除するPL14
        unset($form['image']);
        
        // データベースに保存するPL14
        $news->fill($form);
        $news->save();
        
        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
  
}
