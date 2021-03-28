<div id="sidebar-right" class="sidebar cf" itemscope itemtype="http://schema.org/WPSideBar" role="complementary" aria-label="Sidebar Right">
    <aside id="widgets-wrap-sidebar-right">
        <section id="search-3" class="widget-sidebar frontier-widget widget_search">
            <form role="search" method="get" class="search-form" action="/">
                <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                </label>
                <input type="submit" class="search-submit" value="Search" />
            </form>
        </section>
        <section id="text-2" class="widget-sidebar frontier-widget widget_text">
            <h2 class="widget-title">Contact Us</h2>
            <div class="textwidget">
                <ul>
                    <li><strong>ICQ : {{ infoContact()->icq }}</strong></li>
                    <li><strong>Telegram : {{ infoContact()->telegram }}</strong></li>
                    <li><strong>Email : {{ infoContact()->email }}</strong></li>
                    <li></li>
                </ul>
            </div>
        </section>
        <section id="recent-comments-3" class="widget-sidebar frontier-widget widget_recent_comments">
            <h2 class="widget-title">Recent Comments</h2>
            <ul id="recentcomments">
            @foreach(commentLastest() as $key=>$comment)
                <li class="recentcomments"><span class="comment-author-link"><a href="/{{ $comment->post->slug }}" rel='external nofollow ugc' class='url'>{{ $comment->user->name }}</a></span> on <a href="/{{ $comment->post->slug }}">{{ $comment->post->title }}</a></li>
            @endforeach 
                <!-- <li class="recentcomments"><span class="comment-author-link">lin wei</span> on <a href="index.html#comment-355">Sell Cvv Good Fresh &#038; Cc Fullz Info</a></li>
                <li class="recentcomments"><span class="comment-author-link">sipeen</span> on <a href="index.html#comment-351">Sell Cvv Good Fresh &#038; Cc Fullz Info</a></li>
                <li class="recentcomments"><span class="comment-author-link">John</span> on <a href="index.html#comment-345">Sell Cvv Good Fresh &#038; Cc Fullz Info</a></li>
                <li class="recentcomments"><span class="comment-author-link"><a href='index.html' rel='external nofollow ugc' class='url'>admin</a></span> on <a href="index.html#comment-343">Sell Cvv Good Fresh &#038; Cc Fullz Info</a></li>
                <li class="recentcomments"><span class="comment-author-link">player12</span> on <a href="index.html#comment-341">Sell Cvv Good Fresh &#038; Cc Fullz Info</a></li> -->
            </ul>
        </section>
        <section id="text-3" class="widget-sidebar frontier-widget widget_text">
            <h2 class="widget-title">Bitcoin Rate</h2>
            <div class="textwidget">
                <div class="textwidget">

                    <div id="coindesk-widget" data-size="mpu"></div>
                    <p>
                        <script data-cfasync="false" src="/js/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script data-cfasync="false" src="/js/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="./js//widget.coindesk.com/bpiticker/coindesk-widget.min.js"></script>
                    </p>
                </div>
            </div>
        </section>
    </aside>
</div>
