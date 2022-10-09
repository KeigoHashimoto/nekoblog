@extends('layouts.app')

@section('content')
    <div class="article-index">
        @foreach($articles as $article)
            <p>{{ $article->created_at }}</p>
            <h3>{!! link_to_route('article.show',$article->title,[$article->id]) !!}</h3>
            <p>{{ $article->content }}</p>
        @endforeach
    </div>
@endsection
