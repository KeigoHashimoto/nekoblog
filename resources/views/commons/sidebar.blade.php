<div class="sidebar">
    <a href="https://www.youtube.com/channel/UC01O21K-lSTkhT70c66EhHg?app=desktop">
        <img class="banner" src="{{ asset('image/youtube.jpg') }}" alt="">
    </a>

    <div class="new-article">
        <h2 class="new-article-title">最新記事</h2>
        @foreach($newArticles as $newArticle)
            {!! link_to_route('article.show',$article->created_at->format('y/m/d').' | '.$newArticle->title,[$newArticle->id],['class'=>'new-item']) !!}
        @endforeach
    </div>

    <div class="tags">
        <h2 class="tags-title">タグ</h2>
        @foreach($tags as $tag)
            <p class="tag">{{ $tag->tags }}</p>
        @endforeach
    </div>
</div>