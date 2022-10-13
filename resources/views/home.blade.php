@extends('layouts.app')

@section('content')
    <div class="hands">
        <div id="hand1" class="hand1"><img class="hand-img" src="{{ asset('image/bear_hand.png') }}"></div>
        <div id="hand2" class="hand2"><img class="hand-img" src="{{ asset('image/pero_hands.png') }}"></div>
    </div>
    <div class="index">
        @include('articles.index')
    
        @include('commons.sidebar')
    </div>

    <script>
        const trigerbtn = document.querySelectorAll('.title');
        const hand1 = document.getElementById('hand1');
        const hand2 = document.getElementById('hand2');
        const className1 = "hand-animation"

        for(let i=0; i<trigerbtn.length; i++){
            trigerbtn[i].addEventListener('click',(e)=>{
            e.preventDefault();
            const linkUrl = trigerbtn[i].getAttribute('href');
            hand1.classList.add(className1);
            hand2.classList.add(className1);

            setTimeout(() => {
                location.href=linkUrl;
            }, 800);
        });
        }

        
    </script>
    
@endsection
