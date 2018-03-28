<nav class="navbar navbar-expand-md navbar-dark bg-dark">
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
        <li class="nav-item {{Request::is('posts') ? 'active' : ''}}">
          <a class="nav-link " href="/posts">Posts</a>
        </li>        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      @if (Auth::check())
          <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
      @endif
      </form>
    </div>
  </nav>