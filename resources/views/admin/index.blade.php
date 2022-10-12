<h1>管理者ページ</h1>

<div class="menu">
    @include('articles.index')
    
    <ul>
        <li>{!! link_to_route('article.create','記事の作成') !!}</li>
    </ul>
</div>