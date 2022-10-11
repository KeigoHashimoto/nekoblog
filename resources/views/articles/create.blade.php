@extends('layouts.app')

@section('content')
    <div class="article-create">
        {{ Form::open(['route'=>'article.post','enctype'=>'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('title','タイトル') }}
            {{ Form::text('title',null,['class'=>'form-control']) }}
        </div>    
        <div class="form-group">
            {{ Form::label('tags','タグ') }}
            {{ Form::text('tags',null,['class'=>'form-control']) }}
        </div>    
        <div class="form-group">
            {{ Form::label('content','本文') }}
            {{ Form::textarea('content',null,['class'=>'form-control']) }}
        </div>    
        <div class="form-group">
            {{ Form::label('image','画像') }}
            {{ Form::file('image',null,['class'=>'form-control']) }}
        </div>    

        {{ Form::submit('送信') }}
    </div>
@endsection