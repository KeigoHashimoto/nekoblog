<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Comment;

class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::orderBy('created_at','desc')->paginate(5);

        $newArticles = Article::orderBy('created_at','desc')->limit(5)->get();

        $tags= Tag::get();


        return view('home',compact('articles','newArticles','tags'));
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


        // タグ
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶー一-龠]+)/u',$request->tags,$match);


        $tags=[];
        foreach($match[1] as $tag){
            $record = Tag::firstOrCreate(['tags'=>$tag]);
            array_push($tags,$record);
        }

        $tags_id=[];
        foreach($tags as $tag){
            array_push($tags_id,$tag['id']);
        }
        
        // 画像保存
        if($file = $request->image){
            $fileName = date('Ymd') . $file->getClientOriginalName();
            $path = public_path('upload/');
            $file->move($path,$fileName);
        }else{
            $fileName="";
        }

        $article->image = $fileName;
        $article->save();

        $article->tags()->attach($tags_id);

        return redirect('/');
    }

    public function show($id){
        $article = Article::findOrfail($id);

        $newArticles = Article::orderBy('created_at','desc')->limit(5)->get();

        $tags= Tag::limit(20)->get();

        $comments = Comment::where('article_id','=',$article->id)->orderBy('created_at','desc')->get();

        return view('articles.show',compact('article','comments','newArticles','tags'));
    }
}
