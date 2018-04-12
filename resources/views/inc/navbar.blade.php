{{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Freelance</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{Request::is('about') ? 'active' : ''}}">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item {{Request::is('contact') ? 'active' : ''}}">
            <a class="nav-link" href="/contact">Contact</a>
        </li>        
        <li class="nav-item {{Request::is('messages') ? 'active' : ''}}">
          <a class="nav-link " href="/messages">Messages</a>
        </li>
        <li class="nav-item {{Request::is('vue') ? 'active' : ''}}">
          <a class="nav-link " href="/articles">Articles</a>
        </li>        
        <li class="nav-item dropdown {{Request::is('posts', 'posts/*') ? 'active' : ''}}">
          <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="/posts">View</a>
            <a class="dropdown-item" href="/posts/create">Create</a>
          </div>
        </li>
        <li class="nav-item {{Request::is('threads/create') ? 'active' : ''}}">
            <a class="nav-link " href="/threads/create">New Thread</a>
        </li>                             
      </ul>
    </div>
  </nav> --}}

<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
<a class="navbar-brand" href="#">Navbar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent-3">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        {{-- <li class="nav-item {{Request::is('about') ? 'active' : ''}}">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item {{Request::is('contact') ? 'active' : ''}}">
            <a class="nav-link" href="/contact">Contact</a>
        </li>        
        <li class="nav-item {{Request::is('messages') ? 'active' : ''}}">
          <a class="nav-link " href="/messages">Messages</a>
        </li>
        <li class="nav-item {{Request::is('vue') ? 'active' : ''}}">
          <a class="nav-link " href="/articles">Articles</a>
        </li>        
        <li class="nav-item dropdown {{Request::is('posts', 'posts/*') ? 'active' : ''}}">
          <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="/posts">View</a>
            <a class="dropdown-item" href="/posts/create">Create</a>
          </div>
        </li> --}}
        <li class="nav-item dropdown {{Request::is('threads/*') ? 'active' : ''}}">
            <a class="nav-link dropdown-toggle" href="" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Forum</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="/threads">All Threads</a>
              @guest
              @else
              <a class="dropdown-item" href="/threads?by={{ auth()->user()->name }}">My Threads</a>
              @endguest
              <a class="dropdown-item" href="/threads?popular=1">Popular Threads</a>
              <a class="dropdown-item" href="/threads?unanswered=1">Unanswered Threads</a>
            </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Channels</a>
          <div class="dropdown-menu" aria-labelledby="dropdown02">
            @foreach ($channels as $channel)
              <a class="dropdown-item" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
            @endforeach
          </div>
        </li> 
        <li class="nav-item">
          <a class="nav-link " href="/threads/create">New Thread</a>
      </li>            
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      @guest
        <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="{{ url('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="{{ url('register') }}">{{ __('Register') }}</a>
        </li>
      @else
      <user-notifications></user-notifications>   
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <i class="fa fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">My Profile</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
        @endguest
    </ul>
</div>
</nav>
<!--/.Navbar -->