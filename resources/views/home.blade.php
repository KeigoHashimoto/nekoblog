@extends('layouts.app')

@section('content')
    <div class="hands">
        <div id="hand1" class="hand1"><img class="hand-img" src="{{ asset('image/bear_hand.png') }}"></div>
    </div>
    <div class="index">
        @include('articles.index')
    
        @include('commons.sidebar')
    </div>

    <script>
        const trigerbtn = document.getElementById('title');
        const hand1 = document.getElementById('hand1');
        const className1 = "hand-animation1"

        trigerbtn.addEventListener('click',(e)=>{
            e.preventDefault();
            const linkUrl = trigerbtn.getAttribute('href');
            hand1.classList.add(className1);

            setTimeout(() => {
                location.href=linkUrl;
            }, 800);
        });
    </script>
    
@endsection
