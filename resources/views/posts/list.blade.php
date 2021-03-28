@extends('layouts.app')
@section('title')
<title>
  You searched for {{$query}} | Sell Cvv (Cc) , Dumps track 1 track 2 with pin
</title>
@endsection
@section('content')
<div class="archive-info">
	<h3 class="archive-title">Search Results for – "<span>{{$query}}</span>"</h3>		
</div>
@foreach($posts as $key=>$post)
<div class="post post-list">
    <header class="entry-header cf">
        <h1 class="entry-title" itemprop="headline"><a href="/">{{$post->title}}</a></h1>
    </header>
    <div class="entry-byline cf">
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
      <a href="/dumps-track1-track2">Valid Dumps Track1 Track2</a></strong>
    </p>
</div>
@endforeach
@endsection
