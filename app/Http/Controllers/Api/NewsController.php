<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;

class NewsController extends Controller
{
    public function apiview()
    {
        return view('news.apiview');
    }
    
    public function index(Request $request)
    {
        
        return News::all()->sortByDesc('updated_at');
           
    }
    
    public function addnews(Request $request)
    {
        // $json_title = $request->input('title');
        // $json_body = $request->input('body');
        // $form = array('title'=>$json_title,'body'=>$json_body);
        // $form = json_decode($request);
         $news = new News;
         $news->fill($request->all())->save();
        // $news->save();
        return $request;
        
    }
    
    public function submit(Request $request)
    {   
        $news = new News;
        $news->fill($request->all())->save();
        return $request;
    }
}