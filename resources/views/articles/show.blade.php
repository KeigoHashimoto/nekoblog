@extends('layouts.app')

@section('content')
<div class="show">
    <div class="article-show">
        <div class="article-wrap">
            <h1>{{ $article->title }}</h1>
            <div class="show-small-content">
                <small>{{ $article->created_at }}</small>
                <div class="show-tag">タグ：
                    @foreach($article->tags()->get() as $tag)
                        <small class="tag">{{ $tag->tags }}</small>
                    @endforeach
                </div>
            </div>
            
            <div>
                <div>
                    <p>{!! nl2br(e($article->content)) !!}</p>
                    <a href="{{ asset('upload/'. $article->image) }}"><img class="article-img" src="{{ asset('upload/' . $article->image) }}" alt=""></a>

                    
                    <div class="article-add">
                        <a href="https://www.youtube.com/channel/UC01O21K-lSTkhT70c66EhHg?app=desktop"><img src="{{ asset('image/banner2.jpg') }}" alt=""></a>
                        <p>『噛み癖直らないペロ』YOUTUBEチャンネル絶賛稼働中！</p>    
                    </div>
                </div>
            </div>
        </div>

        {!! link_to_route('comment.create','コメントする',[$article->id],['class'=>'submit']) !!}


        {{-- コメント欄 --}}
        <div class="comments">
            <h5>コメント</h5>
            @foreach($comments as $comment)
            <div class="comment-index">
                <div class="flex">
                    <p>{{ $comment->id }}</p>
                    <p class="comment-content">{{ $comment->comment }}</p>

                </div>
                <div class="flex">
                    <p class="comment-name">{{ $comment->name }}</p>
                    <small>{{ $comment->created_at }}</small>
                </div>
            </div>       
            @endforeach
        </div>
    </div>

    @include('commons.sidebar')
    
</div>
@endsection