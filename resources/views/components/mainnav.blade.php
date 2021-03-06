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

    <div class="float-right">

    <!-- menu -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Listen</a>
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
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @endif

      </ul>
    </div>
  </div>
  </div>
</nav>
