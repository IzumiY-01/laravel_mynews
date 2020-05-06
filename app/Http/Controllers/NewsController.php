<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News; //PHP/Laravel 18 追記


class NewsController extends Controller
{
    //投稿者が投稿した記事の一覧
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        // news/index.blade.php ファイルを渡している
        // View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
