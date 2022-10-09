<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::orderBy('created_at','desc')->get();

        return view('home',compact('articles'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string|max:2000',
            'image'=>'image|file',
        ]);

        $article=new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = \Auth::user()->id;

        if($file = $request->image){
            $fileName = date('Ymd') . $file->getClientOriginalName();
            $path = public_path('upload/');
            $file->move($path,$fileName);
        }else{
            $fileName="";
        }

        $article->image = $fileName;
        $article->save();

        return redirect('/');
    }

    public function show($id){
        $article = Article::findOrfail($id);

        return view('articles.show',compact('article'));
    }
}
