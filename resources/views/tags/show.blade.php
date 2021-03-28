@extends('layouts.app') 
@section('title')
<title>
  Best Cvv Shop | {{ $post->title }} | Suppliers Online
</title>
@endsection
@section('content')
<div class="archive-info">
	<h3 class="archive-title">Tag: <span>{{$tag->name}}</span></h3>	
</div>
<div class="post">
    <header class="entry-header cf">
        <h1 class="entry-title" itemprop="headline"><a href="/">{{$post->title}}</a></h1>
    </header>
    <div class="entry-byline cf">
      <div class="entry-author author vcard" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
        <i class="genericon genericon-user"></i><a class="url fn" href="/" itemprop="name">admin</a>
      </div>
      <div class="entry-comment-info">
        <i class="genericon genericon-comment"></i><a href="/{{$post->slug}}/#comment-area">{{count($post->comments)}} Comments</a>
      </div>
	</div>
    <div class="entry-content cf" itemprop="text">
        {!!html_entity_decode($post->content)!!}
    </div>
    <hr>
    <p style="text-align: center;"><span style="color: #ff0000;"><strong>Contact Us</strong></span></p>
    <p style="text-align: center;"><span style="color: #ff0000;">
    <strong>ICQ :</strong></span> {{$user->icq}}<br>
    <span style="color: #ff0000;"><strong>Telegram :</strong></span> {{ $user->telegram }}<br>
    <span style="color: #ff0000;"><strong>Email :{{$user->email}}</strong>
    <hr>
    <p>
      <strong>You might also be interested by <a href="/">Verified Vendor</a> in 
      <a href="/sell-dumps-track1-track2">Valid Dumps Track1 Track2</a></strong>
    </p>
</div>
@endsection
