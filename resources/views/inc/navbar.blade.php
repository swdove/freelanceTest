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
        <li class="nav-item {{Request::is('vue') ? 'active' : ''}}">
          <a class="nav-link " href="/vue">Vue</a>
        </li>        
        <li class="nav-item dropdown {{Request::is('posts', 'posts/*') ? 'active' : ''}}">
          <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="/posts">View</a>
            <a class="dropdown-item" href="/posts/create">Create</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              <li><a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a></li>
              <li><a class="nav-link" href="{{ url('register') }}">{{ __('Register') }}</a></li>
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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