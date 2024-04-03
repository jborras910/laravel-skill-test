<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="#"><img src="https://www.worldciti.edu.ph/frontend/images/wc_logo_497x265.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa-solid fa-bars"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
 
    </ul>




    <ul class="navbar-nav ml-auto">
      @auth
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa-solid fa-circle-user mr-2"></i>{{auth()->user()->email}}
        </a>
      
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item " href="{{route('logout')}}"><i class="fa-solid fa-user mr-2"></i>Profile</a>
          <a class="dropdown-item " href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</a>
       
        </div>
      </div>
      @else
      <a class="btn btn-success" href="{{route('login')}}">Login</a>
      <a class="btn btn-secondary" href="{{route('registration')}}">Registration</a>
      @endauth  
    </ul>
  </div>

    
</div>
</nav>