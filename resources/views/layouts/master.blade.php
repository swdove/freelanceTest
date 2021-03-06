
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.App = {!! json_encode([
      'csrfToken' => csrf_token(),
      'user' => Auth::user(),
      'signedIn' => Auth::check()
    ]) !!};
    </script>
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>
    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/"> --}}

    <!-- Bootstrap core CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.css">  --}}
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.2/trix.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
    <style>
      body { padding-bottom: 100px;}
      .level { display: flex; align-items: center; }
      .flex { flex: 1;}
      [v-cloak] {display: none;}
      .ais-highlight > em { background: yellow; font-style: normal; }
    </style>
    @yield('header')
  </head>

  <body id="">
    <div id="app">
        @include('inc.navbar')
        <div class="blog-header">
          <div class="container">
            <h1 class="blog-title">BLOG</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
          </div>
        </div>
    
        @yield('content')
    
        <flash message="{{ session('flash') }}"></flash>
        @include('layouts.footer')
    </div>
  </body>
</html>
