<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="{{ route('welcome') }}">Tourist Guide</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="background-color:  #fff;"></span>
    </button>
  
     <div class="collapse navbar-collapse"></div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item a">
          <a class="nav-link" href="{{ route('welcome') }}">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('all.place') }}">Places</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="{{ route('all.package') }}">Packages</a>
        </li>
        
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
                <form class="form-inline my-2 my-lg-0">
                  <a class="btn btn-info my-2 px-4 py-2" href="{{ route('register') }}" type="submit"><b>Sign Up</b></a>
                </form>
                @else
                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                    @if (Auth::user()->role_id == 2)
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                    </li>                    @endif
                @endguest
      </ul>
      
    </div>
  </nav>
  </section>