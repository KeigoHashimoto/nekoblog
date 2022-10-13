<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class AdminController extends Controller
{

    public function index(){
        $articles = Article::orderBy('created_at','desc')->paginate(10);

        $comments = Comment::paginate(20);

        return view('adminHome',compact('articles','comments'));
    }
}
