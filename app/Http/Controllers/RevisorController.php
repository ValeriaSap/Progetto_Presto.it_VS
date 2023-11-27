<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        $article_to_undo = Article::whereNotNull('is_accepted')->orderBy('created_at','DESC')->first();
        return view('revisor.index', compact('article_to_check','article_to_undo'));
    }

    public function acceptArticle(Article $article)
    {   
        $article->setAccepted(true);
        
        return back()->with('message', __('ui.annAccettato'));
    }
    public function rejectArticle(Article $article)
    {
        $article->setAccepted(false);
        return back()->with('message', __('ui.annRifiutato'));
    }
    public function undoArticle(Article $article)
    {
        $article->setAccepted(null);

        return back()->with('message', __('ui.revUndo'));
    }
    public function becomeRevisor(){
        return view('auth.formRevisor');
    }

    public function submit(Request $request){

        $name = $request->name;
        $email = $request->email;
        $body = $request->body;
        
        Mail::to('admin@presto.it')->send(new BecomeRevisor($name, $email, $body));

        return redirect(route('welcome'))->with('message', __('ui.domandaRev'));
    }

    public function makeRevisor($email){
        Artisan::call('presto:makeUserRevisor', ["email"=>$email]);
        return redirect('/')->with('message', __('ui.confermaRev'));
    }
}
