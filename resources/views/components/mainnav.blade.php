

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">

    <!-- logo & title -->
    <a href="/" class="navbar-brand d-flex align-items-center">
      <svg class="bi bi-soundwave" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path stroke="#fff" stroke-linecap="round" d="M2.5 7v2m12-2v2m-2-3v4m-8-4v4m4-7.5v11m-2-9v7m4-7v7"/>
      </svg>
      <strong class="text-white">AudioFog</strong>
      <!-- &nbsp;<span class="text-muted">Node | Veasey</span> -->
    </a>

    <!-- menu -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Listen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('search') ? 'active' : '' }}" aria-current="page" href="/search">Search</a>
        </li>
        @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="/upload">Upload</a>
        </li>
        @endif

        @if (Auth::check())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownuser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Logged in as {{$user->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownuser">
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
          </div >
        </li>
        @else
          <li class="nav-item">
            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
          </li>
        @endif
      </ul>
    </div>

  </div>
</nav>
