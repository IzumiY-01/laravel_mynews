<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Profile; //PHP/Laravel 18 課題１

class ProfileController extends Controller
{
    //投稿者のプロフィールの一覧
    public function index(Request $request)
    {
        $profiles = Profile::all()->sortBy('id');
        \Debugbar::info($profiles);
        // profile/index.blade.php ファイルを渡している
        return view('profile.index', ['profiles' => $profiles]);
    }
    
}
