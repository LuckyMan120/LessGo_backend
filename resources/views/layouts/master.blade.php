<!doctype html>
<html lang="en">
<head>
    <title> LessGo | Reching.Destinations.Together </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Long Distance Ride Sharing (Carpooling)Platform">
    <meta name="theme-color" content="#EA5457">
    <meta name="keywords" content="Carpooling, Book, Ride, Drive, Share, Save Money, Reaching, Destinations, Togather">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/homev2.css">
    <link rel="shortcut icon" href="/img/ogopng-01 2.png">
    <link rel="manifest" href="manifest.json">
    <link rel="alternate" href="http://lessgo.app/" hreflang="en" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128187723-1"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-128187723-1');
    </script>

  </head>

    <body class="scroller btn-rounded @yield('body-class')">
        @include('layouts.navbar')
        <div class="main-container">
            @yield('content')
            @include('layouts.footer')
        </div>
    </body>
</html>
