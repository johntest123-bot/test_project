@extends('layouts.app') 
@section('title')
<title>
  Best Cvv Shop | {{ $post->title }} | Suppliers Online
</title>
@endsection
@section('content')
<div class="post">
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
    @if($post->slug =='f-a-q')    
        <div style="margin-top: 20px;">
         <img  src="/images/verified-300x48.png" style="width: 80%" />
        </div>
    @endif
</div>
@endsection
