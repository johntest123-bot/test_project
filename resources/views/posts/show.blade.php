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
<div id="comment-area">
    <div id="comments">
        <div id="comment-header" class="cf">
            <h3 class="title">{{ count($comments) }} Comments</h3>
            <span class="respond-link"><a href="#respond">Add a Comment</a></span>
        </div>
        <ol class="comment-list">
            @foreach($comments as $key=>$comment)
            <li id="comment-{{$comment->id}}" class="comment even thread-even depth-1">
                <div id="div-comment-{{$comment->id}}" class="comment-body">
                    <div class="comment-meta">
                        <div class="comment-author">
                            @if($comment->user->is_admin)
                            <img src="/images/cropped-Hacker-32x32.png" width="50" height="50" alt="Avatar" class="avatar avatar-50wp-user-avatar wp-user-avatar-50 alignnone photo avatar-default "> @else
                            <img src="/images/user.png" width="50" height="50" alt="Avatar" class="avatar avatar-50wp-user-avatar wp-user-avatar-50 alignnone photo avatar-default "> @endif
                            <div class="link">{{ $comment->user->name }}</div>
                        </div>
                        <div class="comment-metadata">
                            <a href="/#comment-{{$comment->id}}">
                                <time datetime="{{$comment->created_at}}">
                                    {{ date_format($comment->created_at,"F d, Y  H:i A") }}
                                </time>
                            </a>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>
                            {{$comment->content}}
                        </p>
                    </div>
                    <div class="reply"><a rel="nofollow" class="comment-reply-link" href="#comment-{{$comment->id}}" data-commentid="{{$comment->id}}" data-postid="31" data-belowelement="div-comment-{{$comment->id}}" data-respondelement="respond" data-replyto="Reply to Tamim Ahmed"
                            aria-label="Reply to Tamim Ahmed">Reply</a></div>
                </div>
            </li>
            @endforeach
        </ol>
        <div id="respond" class="comment-respond">
            <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/#respond" style="display:none;">Cancel reply</a></small></h3>
            <form method="POST" action="{{ action('CommentController@store') }}"  id="commentform" class="comment-form" enctype="multipart/form-data" >
                @csrf
                <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                <p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment" name="content" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>
                <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" required='required' /></p>
                <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' /></p>
                <p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value="" size="30" maxlength="200" /></p>
                <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" /> <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>
                <p class="form-submit">
                  <input name="submit" type="submit" id="submit" class="submit" value="Post Comment" /> 
                  <input type='hidden' name='post_id' value="{{$post->id}}" id='comment_post_ID' />
                </p>
            </form>
        </div>
    </div>
</div>
@endsection @section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(".respond-link").click(function() {
        $('.comment-respond').show();
    });
    $('#cancel-comment-reply-link').click(function() {
        $('.comment-respond').hide();
    });
    // $.ajax({
    //     type: 'get',
    //     url: '/cart_products',
    //     data: { ids: ids },
    //     success: function(data) {
    //         $(".number_order").html(data.length);
    //         $('.list-carts').find("tr").toArray().forEach(function(value, index) {
    //             if (index > 0) {
    //                 value.remove();
    //             }
    //         });
    //     },
    //     error: function(data) {

    //     }
    // };
</script>
@endsection
