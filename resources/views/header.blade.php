<div id="top-bar" class="cf">
    <div id="top-bar-info">
        <h2 id="site-title"><a href="/">Sell Cvv (Cc) , Dumps track 1 track 2 with pin</a></h2>
        <span id="site-description">VERIFIED SELLER</span>
    </div>
</div>
<div id="header" class="cf" itemscope itemtype="http://schema.org/WPHeader" role="banner">
    <div id="header-logo">
        <a href="/"><img src="../images/vendor.png" alt="Sell Cvv (Cc) , Dumps track 1 track 2 with pin" /></a>
    </div>
</div>
<nav id="nav-main" class="cf stack" itemscope itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="Main Menu">
    <ul id="menu-top-menu" class="nav-main">
    @foreach (listMenu() as $key=>$menu)
        <li id="menu-item-{{$key}}" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{{$key}}"><a href="/{{$menu->slug}}">{{$menu->name}}</a></li>
    @endforeach
    </ul>
</nav>
@if (Auth::check())
    @if (Auth::user()->is_admin == true)
      <a href="/admin/list" class="admin_btn">Trang quản trị</a>
    @endif
@endif
