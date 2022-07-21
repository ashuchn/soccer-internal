<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Soccer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @if(Session::has('chatUserId'))
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('user-logout') }}">Logout</a>
        </li>
        @else
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('signup') }}">Signup</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
