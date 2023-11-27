<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    function welcome() {
        $articles = Article::all();
        $lastArticles = Article::where('is_accepted', true)->latest()->take(6)->get();
        return view('welcome', compact('articles', 'lastArticles'));
    }

    public function searchArticles(Request $request){
        
        $articles = Article::search($request->searched)->orderBy('created_at', 'desc')->where('is_accepted', true)->paginate(10);
        
        return view('article.index', compact('articles'));
    }

   public function setLanguage($lang){

    session()->put('locale', $lang);
    return redirect()->back();
    
   }


   public function profile(){
    $articles = Article::where('user_id', Auth::user()->id)->paginate(2);
    return view('auth.profile', compact('articles'));
   }
}

