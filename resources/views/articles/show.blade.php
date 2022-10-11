@extends('layouts.app')

@section('content')
<div class="show">
    <div class="article-show">
        <div class="article-wrap">
            <h1>{{ $article->title }}</h1>
            <small>{{ $article->created_at }}</small>
            <div>タグ：
                @foreach($article->tags()->get() as $tag)
                    <small class="tag">{{ $tag->tags }}</small>
                @endforeach
            </div>
            
            <div>
                <p>{!! nl2br(e($article->content)) !!}</p>
                <a href="{{ asset('upload/'. $article->image) }}"><img class="article-img" src="{{ asset('upload/' . $article->image) }}" alt=""></a>
            </div>
        </div>

        {{-- コメント欄 --}}
        <div class="comments">
            {{ Form::open(['route'=>['comment.post',$article->id]]) }}
            <div class="form-group">
                {{ Form::label('name','ニックネーム') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('comment','コメント') }}
                {{ Form::textarea('comment',null,['class'=>'form-control']) }}
            </div>
            {{ Form::submit('送信') }}
            {{ Form::close() }}

            <div class="coment-index">
                @foreach($comments as $comment)
                    <p class="comment-name">{{ $comment->name }}</p>
                    <p class="comment-content">{{ $comment->comment }}</p>
                @endforeach
            </div>       
        </div>
    </div>

    @include('commons.sidebar')
    
</div>
@endsection