@extends('layouts.app')

@section('content')
<h1>{{ $article->title }}</h1>
<small>{{ $article->created_at }}</small>
<div>
    {{ $article->content }}
    <a href="{{ asset('upload/'. $article->image) }}"><img class="article-image" src="{{ asset('upload/' . $article->image) }}" alt=""></a>
</div>

@endsection