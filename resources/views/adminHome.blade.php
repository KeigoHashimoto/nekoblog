@extends('layouts.app')

@section('content')
    <div id="app" class="container">
        @auth
        <div class="admin-menu">
            <h3>管理メニュー</h3>
            
            {!! link_to_route('article.create','記事を作る',[],['class'=>'block']) !!}

            <div>
                {{ Form::open(['route'=>'logout']) }}
                    {{ Form::submit('ログアウト',['class'=>'block']) }}
                {{ Form::close() }}
            </div>
        </div>

        <div class="article-admin-index">
        <h3 class="center">投稿記事</h3>
            @foreach($articles as $article)
                <div class="article-admin">
                    <div>
                        <h3 class="article-index-title">{!! link_to_route('article.show',$article->title,[$article->id]) !!}</h3>
                    </div>
                    <div class="admin-btns">
                        {!! link_to_route('article.edit','編集',[$article->id],['class'=>'edit']) !!}
                        {{ Form::open(['route'=>['article.delete',$article->id],'method'=>'delete']) }}
                            {{ Form::submit('削除',['class'=>'delete','id'=>'btn1']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            @endforeach

            {{ $articles->links() }}
        </div>

        <div class="comments-admin">
            <h3 class="center">コメント</h3>
            @foreach($comments as $comment)
                <div class="comment-admin">
                    <div>ID:{{ $comment->id }}|&nbsp;Name:{{ $comment->name }}&nbsp;|Comment:{{ $comment->comment }}|&nbsp;コメント対象記事:{!! link_to_route('article.show',$comment->article->title,[$comment->article->id]) !!}</div>
                    {{ Form::open(['route'=>['comment.delete',$comment->id],'method'=>'delete']) }}
                        {{ Form::submit('削除',['class'=>'delete','id'=>'btn2']) }}
                    {{ Form::close() }}    
                </div>
            @endforeach
           {{ $comments->links()  }}
        </div>

        @else
        <div class="form">
            <h3 class="center">管理者用</h3>
            <div class="welcome-btn">
                {!! link_to_route('login','ログイン',[],['class'=>'submit']) !!}
            </div>
            {!! link_to_route('articles.index','top',[],['class'=>'center']) !!}
        </div>
        @endauth
    </div>
@endsection