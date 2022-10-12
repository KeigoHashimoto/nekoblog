@extends('layouts.app')

@section('content')
<div class="form">
    <div class="article-create">
        {{ Form::model($article,['route'=>['article.update',$article->id],'enctype'=>'multipart/form-data','method'=>'put']) }}
        <div class="form-group">
            {{ Form::label('title','タイトル') }}
            {{ Form::text('title',null,['class'=>'form-control']) }}
        </div>       
        <div class="form-group">
            {{ Form::label('content','本文') }}
            {{ Form::textarea('content',null,['class'=>'form-control']) }}
        </div>    
        <div class="form-group">
            {{ Form::label('image','画像') }}
            {{ Form::file('image',null,['class'=>'form-control']) }}
        </div>    

        {{ Form::submit('送信',['class'=>'submit']) }}
    </div>
</div>

    
@endsection