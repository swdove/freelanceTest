
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { scrftToken: '{{ csrf_token() }}'}</script>
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.css">  --}}

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <style>
      body { padding-bottom: 100px;}
      .level { display: flex; align-items: center; }
      .flex { flex: 1;}
    </style>
  </head>

  <body>

    @include('inc.navbar')

    @if ($flash = session('message'))
    <div class="alert alert-success" role="alert">
      {{ $flash }}
    </div>
    @endif

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">FUCK</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
      </div>
    </div>

    @yield('content')
    {{-- @include('layouts.sidebar') --}}
    @include('layouts.footer')
  </body>
</html>
