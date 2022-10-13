@extends('layouts.app')

@section('content')
    <div class="hands">
        <div id="hand1" class="hand1"><img class="hand-img" src="{{ asset('image/bear_hand.png') }}"></div>
        <div id="hand2" class="hand2"><img class="hand-img" src="{{ asset('image/pero_hands.png') }}"></div>
        <div id="hand3" class="hand3"><img class="hand-img" src="{{ asset('image/cat-hands3.png') }}"></div>
        <div id="tail1" class="tail1"><img class="hand-img" src="{{ asset('image/cat_shipo.png') }}"></div>
    </div>
    <div class="index">
        @include('articles.index')
    
        @include('commons.sidebar')
    </div>

    <script>
        const trigerbtn = document.querySelectorAll('.title');
        const hand1 = document.getElementById('hand1');
        const hand2 = document.getElementById('hand2');
        const hand3 = document.getElementById('hand3');
        const tail1 = document.getElementById('tail1');
        const className1 = "hand-animation"

        for(let i=0; i<trigerbtn.length; i++){
            trigerbtn[i].addEventListener('click',(e)=>{
            e.preventDefault();
            const linkUrl = trigerbtn[i].getAttribute('href');
            hand1.classList.add(className1);
            hand2.classList.add(className1);
            hand3.classList.add(className1);
            tail1.classList.add(className1);

            setTimeout(() => {
                location.href=linkUrl;
            }, 800);
        });
        }

        
    </script>
    
@endsection
