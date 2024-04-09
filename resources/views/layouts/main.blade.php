<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>
    
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/css/provider.css', 'resources/css/admin.css' , 'resources/css/center.css', 'resources/css/rider.css', 'resources/css/app.scss', 'resources/js/app.js', 'resources/js/custom.js', 'resources/js/rider.js',
    'resources/js/login.js','resources/js/provider.js', 'resources/js/footerAndMenuCollision.js', 'resources/js/voiceRec.js', 'resources/js/carrouselMovement.js'])
</head>

<body class="bg-primary">

  <nav class="navbar navbar-expand-lg bg-light" >
    <div class="container">
        @if (Auth::check())
        {{-- <a href="{{url('login')}}"> --}}
            <meta name="userId" content="{{ Auth::user()->id_usu }}">
            <button class="navbar-toggler userButton" type="button" data-bs-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" href="{{ url('login')}}">
            <img src="{{ asset('img/logoUsuario.svg') }}" alt="">
            </button>
        {{-- </a> --}}
        @endif
      <div class="logo">
          <a href="{{url('/')}}"><img src="{{ asset('img/JoInvitoLogo.svg') }}" alt=""></a>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <img src="{{ asset('img/menuCorto.svg') }}" alt=""></button>

          <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  @if (Auth::check() && (Auth::user()->rol->nombre == 'admin' || Auth::user()->rol->nombre == 'rider' || Auth::user()->rol->nombre == 'centro' || Auth::user()->rol->nombre == 'proveedor'))
                    @php
                        $userName = Auth::user()->rol->nombre
                    @endphp
                    <li class="nav-item" id="logout">
                      <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false"><button type="button" class="btn btn-logout">Logout 
                        @if (Auth::user()->rol->nombre == 'admin')
                          {{ $userName }}    
                        @else
                          {{ Auth::user()->$userName->nombre }}    
                        @endif 
                      </button></a>
                    </li>
                    @else
                    <li class="nav-item" id="login">
                      <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}" alt="">Login</button></a>
                    </li>
                  @endif
              </ul>
          </div>
          <div id="loginRegistroNavbar">
            @if (Auth::check() && (Auth::user()->rol->nombre == 'admin' || Auth::user()->rol->nombre == 'rider' || Auth::user()->rol->nombre == 'centro' || Auth::user()->rol->nombre == 'proveedor'))
            @php
                $userName = Auth::user()->rol->nombre
            @endphp
                <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false"><button type="button" class="btn btn-logout">Logout  
                  @if (Auth::user()->rol->nombre == 'admin')
                    {{ $userName }}    
                  @else
                    {{ Auth::user()->$userName->nombre }}    
                  @endif 
                </button></a>
            @else
                <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}" alt="">Login</button></a>
            @endif
        </div>
      </div>
    </div>
  </nav>
  <div class="content">
    @yield('content')
  </div>
  @if (Auth::check())
    @if (Auth::user()->rol->nombre == 'rider')
    <div class="flotante container text-center" id="floatingMenu">
        <div class="row">
          <div class="col"><a class="nav-link" href="{{ url('addLocation') }}" aria-expanded="false"><img src="{{ asset('img/puaMap.svg') }}" alt="" ></a></div>
          <div class="col"><a class="nav-link" href="{{ url('/rider') }}" aria-expanded="false"><img src="{{ asset('img/homeCorto.svg') }}" alt=""></a></div>
          <div class="col"><a class="nav-link" href="{{ url('/edit-rider') }}" aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt=""></a></div>
        </div>
      </div>
    @endif
    @if (Auth::user()->rol->nombre == 'proveedor')
    <div class="flotante container text-center" id="floatingMenu">
        <div class="row">
          <div class="col"><a class="nav-link" href="{{ url('addLocation') }}" aria-expanded="false"><img src="{{ asset('img/puaMap.svg') }}" alt=""></a></div>
          <div class="col"><a class="nav-link" href="{{ url('/provider') }}" aria-expanded="false"><img src="{{ asset('img/homeCorto.svg') }}" alt=""></a></div>
          <div class="col"><a class="nav-link" href="{{ url('edit-provider') }}" aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt=""></a></div>
        </div>
      </div>
    @endif
    @if (Auth::user()->rol->nombre == 'centro')
    <div class="flotante container text-center" id="floatingMenu">
        <div class="row">
          <div class="col"><a class="nav-link" href="{{ url('addLocation') }}" aria-expanded="false"><img src="{{ asset('img/puaMap.svg') }}" alt=""></a></div>
          <div class="col"><a class="nav-link" href="{{ url('/rider') }}" aria-expanded="false"><img src="{{ asset('img/homeCorto.svg') }}" alt=""></a></div>
          <div class="col"><a class="nav-link" href="{{ url('edit-center') }}" aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt=""></a></div>
        </div>
      </div>
    @endif
    @if (Auth::user()->rol->nombre == 'admin')
    <div class="flotante container text-center" id="floatingMenu">
        <div class="row">
          <div class="col"><a class="nav-link" href="{{ url('addLocation') }}" aria-expanded="false"><img src="{{ asset('img/puaMap.svg') }}" alt=""></a></div>
          <div class="col"><a class="nav-link" href="{{ url('/rider') }}" aria-expanded="false"><img src="{{ asset('img/homeCorto.svg') }}" alt=""></a></div>
          <div class="col"><a class="nav-link" href="{{ url('edit-center') }}" aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt=""></a></div>
        </div>
      </div>
    @endif
  @endif
  @yield('map')
  <footer class="py-2" id="footer">
    <p class="footerTitle">JOINVITO</p>
    <p>Este sitio está protegido por reCAPTCHA y se aplican las Condiciones de servicio y la Política de privacidad de Google.
    </br> © 2024 JOINVITO Technologies Inc.</p>
  </footer>

</body>
</html>
