@extends('layouts.app')

@section('content')
<div class="form">
    <h3 class="title">コメント</h3>
    <p class="warning">※誹謗中傷や不適切なコメントは絶対にしないようお願いいたします。</p>
    
    {{ Form::open(['route'=>['comment.post',$article->id]]) }}
    <div class="form-group">
        {{ Form::label('name','ニックネーム') }}
        {{ Form::text('name',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('comment','コメント') }}
        {{ Form::textarea('comment',null,['class'=>'form-control']) }}
    </div>
    {{ Form::submit('送信',['class'=>'submit']) }}
    {{ Form::close() }}
</div>


@endsection