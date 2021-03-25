@extends('layouts.app') 
@section('content')
<div class="container-crumb">
    <div class="texttitle sitemaps">
        <a href="/">Trang Chủ</a>
        <a href="#">Tin tức</a>
    </div>
</div>
<div id="body-left">
    @include('articles.menu_left')
</div>
<div id="body-right">
    <div class="middle-page">
        <div style="padding-bottom:25px;position:relative" class="_100">
            @foreach ($categories as $category)
            <div class="show-page" style="background-color:#fff;margin-bottom:10px;border: 1px solid #DDD;border-radius:8px">
                <div class="title-show-page">
                    <a href="{{ route('article_category_details', ['id' => $category->slug]) }}">{{ $category->name }}</a>
                </div>
                <ul class="page-tech">
                    @foreach ($category->articles->take(10) as $article)
                    <li style="background: none;padding-left: 0;">
                        <div style="float:left;margin-right: 4%;width:22%;">
                            <a style="padding-right:6px; display:block; float:left;" href="/news-detail/{{ $article->slug }}">
                                <img src="{{ loadImage($article->thumbnail) }}" />
                            </a>
                        </div>
                        <div style="width: 73%;float: left;">
                            <a href="/news-detail/{{ $article->slug }}">{{ $article->title }}</a>
                            <br>
                            <span style=" padding:2px 2px 0 3px;">{{ date('d/m/Y | G:i', strtotime($article->created_at)) }}</span>
                            <span class="cmt-count">{{ getTotalReplies($article) }}</span>
                            <span class="view-count">{{ $article->view_count }}</span><br> {!! Str::words(strip_tags($article->content), 40, '...')  !!}
                        </div>
                        <div class="clear"></div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
    @include('articles.menu_right')
</div>
@endsection