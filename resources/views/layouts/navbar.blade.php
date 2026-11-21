<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    @auth
    <a class="navbar-brand" href="#">Navbar  Welcome {{Auth::user()->name}}</a>
    @endauth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('user.index')}}">Home</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.index')}}">users</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('driver.index')}}">Drivers</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('car.index')}}">Cars</a>
        </li>



      
        @endauth


        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>

        <li class="nav-item">
          <a class="av-link" href="{{route('register')}}">Register</a>
        </li>
     @endguest



        @auth

          <li class="nav-item">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link btn btn-link">Logout</button>
          </form>
        </li>

        @endauth




      </ul>

    </div>
  </div>
</nav>