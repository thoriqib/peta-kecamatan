<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @auth
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/upload" class="nav-link"><i class="fas fa-upload"></i> Upload</a>
        </li>
      @endauth
    </ul>

    <ul class="navbar-nav ml-auto">
      @auth
        <li class="nav-item dropdown">
            <a class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Selamat Datang, {{auth()->user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <div><a class="dropdown-item" href="/">Home</a></div>
              <div><hr class="dropdown-divider"></div>
              <form action="/logout" method="post">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
              </form>
            </div>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/login">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
        </li>
      @endauth
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->