<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <img class="logo-size" src="{{ asset('img/logo.svg') }}" alt="logo" height="50">
    <a class="navbar-brand" href="/"> {{config('app.name', 'Bus Ticketing')}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="\">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="\about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="\contact">Contact</a>
      </li>
    </ul>
    
     <!-- Right Side Of Navbar -->
     <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  
                  <a class="dropdown-item" href="{{ route('users.show', ['user' => Auth::user()]) }}">Profile</a>
                  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
  </ul>
  </div>
</nav>