<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','categoryShow','show');
    }
   

    public function create(){

        return view('article.create');
    }
    
    public function show(Article $article){
        return view('show', compact('article'));
    }

    public function index(){
        $articles = Article::orderBy('created_at', 'desc')->where('is_accepted', true)->paginate(6);
        return view('article.index', compact('articles'));
    }

    /* public function prova(){
        $articles = Article::all();
        $categories = Category::all();
        return view('prova', compact('articles', 'categories'));
    } */

    public function categoryShow(Category $category){
        $articles = Article::orderBy('created_at', 'desc')->where('is_accepted', true)->get();       
        return view('categoryShow', compact('category', 'articles'));
    }
}
