<div class="article-index">
    @foreach($articles as $article)
        <div class="article">
            @if(!empty($article->image))
                <a href="{{ route('article.show',$article->id)}}" class="title"><img class="index-img" src="{{ asset('upload/'.$article->image) }}" alt=""></a>
            @endif
            <div>
                <p>{{ $article->created_at }}</p>
                <h3 class="article-index-title">{!! link_to_route('article.show',$article->title,[$article->id]) !!}</h3>
                <p class = "article-index-title">{{ $article->content }}</p>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
</div>