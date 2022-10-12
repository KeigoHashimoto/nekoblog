<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function create($id){
        $article = Article::findOrFail($id);

        return view('comments.create',compact('article'));
    }

    public function store(Request $request,$id){
        $request->validate([
            'name'=>'required|string|max:255',
            'comment'=>'required|string|max:500',
        ]);

        $article=Article::findOrFail($id);

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->article_id = $article->id;
        $comment->ip = $request->ip();
        $comment->save();

        return redirect('/show/'.$article->id);
    }

    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back();
    }
}
