<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//php/Laravel 14追記
use App\News; //(News Modelが扱えるようになる)

//php/Laravel 17追記
use App\History; //History Modelが扱えるようになる）
use Carbon\Carbon; //日付操作ライブラリ

class NewsController extends Controller
{
    //追記
    public function add()
    {
        return view('admin.news.create');
    }
    
    //PHP/Laravel 13 追記
    public function create(Request $request)
    {
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
        \Debugbar::info($news);
        // admin/news/createにリダイレクトする
        return redirect('admin/news');
    }
    
    // PHP/Laravel 15追記 一覧作成
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = News::where('title', $cond_title)->get();
            \Debugbar::info($posts);
        } else {
          // それ以外はすべてのニュースを取得する
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    //PHP/Laravel 16追記 (編集・更新)
    public function edit(Request $request)
    {
        // News Modelからデータを取得する
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.news.edit', ['news_form' => $news]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, News::$rules);
        // News Modelからデータを取得する
        $news = News::find($request->id);
        // 送信されてきたフォームデータを格納する
        $news_form = $request->all();
        
        if (isset($news_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
            unset($news_form['image']);
        } elseif (isset($request->remove)) {
            $news->image_path = null;
            unset($news_form['remove']);
        }
        unset($news_form['_token']);
        
        // 該当するデータを上書きして保存する
        $news->fill($news_form)->save();
        
        //PHP/Laravel17 追記
        $history = new History;
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        \Debugbar::info($history);
        $history->save();
        
        return redirect('admin/news');
    }
    
    //PHP/Laravel 16追記(削除)
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $news = News::find($request->id);
        // 削除する
        $news->delete();
        return redirect('admin/news/');
    }
}
