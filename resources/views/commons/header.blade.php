
<div class="header">
    <img class="hero-image" src="{{ asset('image/headerImg.jpg') }}" alt="">
    <nav>
        <ul>
            <li>{!! link_to_route('articles.index','ホーム') !!}</li>
            <li>にゃんとな出逢い</li>
            <li>黒猫ベアから学ぶ腎臓病猫の飼い方</li>
            <li>{!! link_to_route('welcome','admin',[],['class'=>'link-white']) !!}</li>
        </ul>
    </nav>
</div>
