<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ url('logo/logo1.png') }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ url('js/comment-reply.mine23c.js') }}" defer></script>
  <script src="{{ url('js/wp-embed.mine23c.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  @yield('title')
  <!-- Styles -->
  <link href="{{ url('css/style.css') }}" rel="stylesheet">
  <link href="{{ url('css/style3ba1.css') }}" rel="stylesheet">
  <link href="{{ url('css/responsive3ba1.css') }}" rel="stylesheet">
  <link href="{{ url('css/genericons3ba1.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body class="home page-template-default page page-id-31 custom-background">
  <div id="container" class="cf" itemscope itemtype="http://schema.org/WebPage">
      @include('header')
      <div class="flash-message">
        @include('layouts.partials.alert_section')
      </div>
      <div id="main" class="col-cs cf">
        <div id="content" class="cf"  role="main">
          @yield('content')
        </div>
        @include('sidebar_right')
      </div>
      @include('footer')
  </div>
  @yield('js')
</body>
</html>
