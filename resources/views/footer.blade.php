<div id="footer" class="cf" itemscope itemtype="http://schema.org/WPFooter">
    <aside id="widgets-wrap-footer" class="widget-column-1 cf">
        <section id="tag_cloud-2" class="widget-footer frontier-widget widget_tag_cloud">
            <h2 class="widget-title">Tags</h2>
            <div class="tagcloud">
            @foreach(listTags() as $key=>$tag)
                <a href="tag/{{$tag->slug}}" class="tag-cloud-link tag-link-27 tag-link-position-1" style="font-size: 8pt;" aria-label="201 dumps atm (1 item)">{{$tag->name}}</a>
            @endforeach
            </div>
        </section>
    </aside>
</div>
<div id="bottom-bar" class="cf" role="contentinfo">
    <span id="bottom-bar-text">Best Seller Cvv Dumps © Trusted Vendor Since 2020</span>
    <span id="theme-link"><a href="/">trustedcvv.com</a></span>
</div>
