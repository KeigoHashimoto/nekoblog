
<div class="header">
    <img class="hero-image" src="{{ asset('image/headerImg.jpg') }}" alt="">
    <nav>
        <ul>
            <li>{!! link_to_route('articles.index','ホーム') !!}</li>
            <li><a href="https://nyanto-na-deai.nyanta.jp/">にゃんと！な出逢い</a></li>
            <li><a href="http://blackcat-bear.sakura.ne.jp/">黒猫ベアから学ぶ腎臓病猫の飼い方</a></li>
            <li>{!! link_to_route('welcome','admin',[],['class'=>'link-white']) !!}</li>
        </ul>
    </nav>
</div>
