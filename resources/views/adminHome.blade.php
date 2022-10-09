@extends('layouts.app')

@section('content')
    <div class=" container">
        @auth
            @include('admin.index')
            {{ Form::open(['route'=>'logout']) }}
                {{ Form::submit('ログアウト') }}
            {{ Form::close() }}
        @else
            <div class="welcome-btn">
                {!! link_to_route('login','ログイン') !!}
                {!! link_to_route('register','登録') !!}    
            </div>
            {!! link_to_route('articles.index','top',[],['class'=>'center']) !!}
        @endauth
        
    </div>
@endsection