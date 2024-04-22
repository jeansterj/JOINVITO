<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/e2ad7870-c28f-4c3e-8ab8-86109bc93443/webchat/config.js" defer></script>

    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/css/provider.css', 'resources/css/admin.css', 'resources/css/center.css', 'resources/css/rider.css', 'resources/css/app.scss', 'resources/js/app.js', 'resources/js/custom.js', 'resources/js/rider.js', 'resources/js/login.js', 'resources/js/provider.js', 'resources/js/footerAndMenuCollision.js', 'resources/js/voiceRec.js', 'resources/js/carrouselMovement.js', 'resources/js/showQrInModal.js', 'resources/js/cameraAction.js', 'resources/js/openChatIa.js', 'resources/js/hoverAnimation.js', 'resources/js/translations.js', 'resources/js/accesibility.js', 'resources/js/admin.js', 'resources/js/video.js', 'resources/js/searchProvider.js', 'resources/js/searchRider.js', 'resources/js/addPedido.js'])
</head>

<body class="bg-primary" id="bodyMain">
    <div class="accesibilityDiv" id="accesibilityDiv">
        <img src="{{ asset('img/accesibility_icon2.svg') }}" id="accesibilityIcon" data-toggle="modal" data-target="#acModal">
    </div>
    <div class="modal fade" id="acModal" tabindex="-1" role="dialog" aria-labelledby="acModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="acModal">Accesibility Options</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table" id="tableMain">
                    <tbody>
                      <tr>
                        <td><h1 class="accTitle">Dislexia</h1></td>
                        <td><input type="checkbox" class="inputAcc" id="dislexiaButton" value="off" ></td>
                      </tr>
                      <tr>
                        <td><h1 class="accTitle">Epilepsia</h1></td>
                        <td><input type="checkbox" class="inputAcc epilepsiaButton" id="epilepsiaButton" value="off" disabled></td>
                        {{-- <p>For read the qr or enable the camera, you have to disable the epilepsia mode</p> --}}
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="page" id="page">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <div class="alert alertEpilepsia" id="alertEpilepsia">
                    <p class="pAlert">You have to disable the epilepsia mode</p>
                </div>
                @if (Auth::check())
                    {{-- <a href="{{url('login')}}"> --}}
                    <meta name="userId" content="{{ Auth::user()->id_usu }}">
                    <meta name="userType" content="{{ Auth::user()->rol->nombre }}">
                    <button class="navbar-toggler userButton" type="button" data-bs-toggle="collapse"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        href="{{ url('login') }}">
                        <img src="{{ asset('img/logoUsuario.svg') }}" alt="">
                    </button>
                    {{-- </a> --}}
                @endif
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/JoInvitoLogo.svg') }}" alt=""></a>
                </div>
                <button class="navbar-toggler buttonMenu" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation" >
                    <img src="{{ asset('img/menuCorto.svg') }}" alt=""></button>

                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if (Auth::check() &&
                                (Auth::user()->rol->nombre == 'admin' ||
                                    Auth::user()->rol->nombre == 'rider' ||
                                    Auth::user()->rol->nombre == 'centro' ||
                                    Auth::user()->rol->nombre == 'proveedor'))
                            @php
                                $userName = Auth::user()->rol->nombre;
                            @endphp
                            <li class="nav-item" id="logout">
                                <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false"><button data-translate="cerrarSesion" type="button"
                                        class="btn btn-logout" >Logout
                                        @if (Auth::user()->rol->nombre == 'admin')
                                            {{ $userName }}
                                        @else
                                            {{ Auth::user()->$userName->nombre }}
                                        @endif
                                    </button></a>
                            </li>
                        @else
                            @yield('navbarContent')
                            <li class="nav-item" id="login">
                                <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button"
                                        class="btn btn-login" data-translate="iniciarSesion"><img src="{{ asset('img/logoUsuario.svg') }}"
                                            alt="" >Login</button></a>
                            </li>
                            @yield('img')
                        @endif
                    </ul>
                    @yield('esfera')
                </div>
                <div id="loginRegistroNavbar">
                    @if (Auth::check() &&
                            (Auth::user()->rol->nombre == 'admin' ||
                                Auth::user()->rol->nombre == 'rider' ||
                                Auth::user()->rol->nombre == 'centro' ||
                                Auth::user()->rol->nombre == 'proveedor'))
                        @php
                            $userName = Auth::user()->rol->nombre;
                        @endphp
                        <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false"><button data-translate="cerrarSesion" type="button"
                                class="btn btn-logout" >Logout
                                @if (Auth::user()->rol->nombre == 'admin')
                                    {{ $userName }}
                                @else
                                    {{ Auth::user()->$userName->nombre }}
                                @endif
                            </button></a>
                    @else
                        <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button"
                                class="btn btn-login" data-translate="iniciarSesion"><img src="{{ asset('img/logoUsuario.svg') }}"
                                    alt="" >Login</button></a>
                    @endif
                </div>
                <div class="dropdown langItem">
                    <input type="checkbox" id="dropdown">

                    <label class="dropdown__face langDropdown" for="dropdown" id="dropdown" >
                        {{-- <p class="dropdownText" data-translate="lang">Lang</p> --}}
                        <img src="{{ asset('img/traducir.svg') }}"></img>
                    {{-- <div class="dropdown__arrow"></div> --}}
                    </label>

                    <ul class="dropdown__items">
                        <a href="#" id="esLink" class="text-secondary"><img src="../public/img/flag-spain-icon.png" alt="" class="flags" id="sp"></a>
                        <a href="#" id="catLink" class="text-secondary"><img src="../public/img/flag-cat-icon.png" alt="" class="flags" id="cat"></a>
                        <a href="#" id="engLink" class="text-secondary"><img src="../public/img/flag-eng-icon.png" alt="" class="flags" id="eng"></a>
                    </ul>
                </div>
                <svg id="svg">
                    <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                    <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                    </filter>
                </svg>
                {{-- <a href="#" id="esLink" class="text-secondary"><img src="../public/img/flag-spain-icon.png" alt="" class="flags" id="sp"></a> --}}
                {{-- <a href="#" id="catLink" class="text-secondary"><img src="../public/img/flag-cat-icon.png" alt="" class="flags" id="cat"></a> --}}
                {{-- <a href="#" id="engLink" class="text-secondary"><img src="../public/img/flag-eng-icon.png" alt="" class="flags" id="eng"></a> --}}
            </div>
        </nav>
        <div class="content" id="content">
            <div id="containerDivSubrayador">
                <div id="divSubrayador"></div>
            </div>
            @yield('content')
            <div class="contentHome">
                @yield('contentHome')
            </div>
        </div>
        @if (Auth::check())
            @if (Auth::user()->rol->nombre == 'rider')
                <div class="flotante container text-center" id="floatingMenu">
                    <div class="row">
                        <div class="col">
                            {{-- <a class="nav-link" href="{{ url('addLocation') }}" aria-expanded="false"><img
                                    src="{{ asset('img/puaMap.svg') }}" alt=""></a> --}}
                                </div>
                        <div class="col"><a class="nav-link" href="{{ url('/rider') }}" aria-expanded="false"><img
                                    src="{{ asset('img/homeCorto.svg') }}" alt=""></a></div>
                        <div class="col">
                            {{-- <a class="nav-link" href="{{ url('/edit-rider') }}"
                                aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt=""></a> --}}
                            </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->rol->nombre == 'proveedor')
                <div class="flotante container text-center" id="floatingMenu">
                    <div class="row">
                        <div class="col">
                            {{-- <a class="nav-link" href="{{ url('addLocation') }}"
                                aria-expanded="false"><img src="{{ asset('img/puaMap.svg') }}" alt=""></a> --}}
                            </div>
                        <div class="col"><a class="nav-link" href="{{ url('/proveedor') }}"
                                aria-expanded="false"><img src="{{ asset('img/homeCorto.svg') }}" alt=""></a>
                        </div>
                        <div class="col">
                            {{-- <a class="nav-link" href="{{ url('edit-provider') }}"
                                aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt=""></a> --}}
                            </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->rol->nombre == 'centro')
                <div class="flotante container text-center" id="floatingMenu">
                    <div class="row">
                        <div class="col">
                            {{-- <a class="nav-link" href="{{ url('addLocation') }}"
                                aria-expanded="false" ><img src="{{ asset('img/puaMap.svg') }}" alt=""></a> --}}
                            </div>
                        <div class="col">
                            <a class="nav-link" href="{{ url('/centro') }}" aria-expanded="false"><img
                                    src="{{ asset('img/homeCorto.svg') }}" alt=""></a>
                                </div>
                        <div class="col">
                            {{-- <a class="nav-link" href="{{ url('edit-center') }}"
                                aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt=""></a> --}}
                            </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->rol->nombre == 'admin')
                <div class="flotante container text-center" id="floatingMenu">
                    <div class="row">
                        <div class="col"><a class="nav-link" href="{{ url('/admin') }}" aria-expanded="false"><img
                                    src="{{ asset('img/homeCorto.svg') }}" alt=""></a></div>
                    </div>
                </div>
            @endif
        @endif
        @yield('map')
        </div>
        <footer class="py-2" id="footer">
            <hr>
            <p class="footerTitle">JOINVITO</p>
            <p data-translate="ProtecReCaptcha">Este sitio está protegido por reCAPTCHA y se aplican las Condiciones de servicio y la Política de privacidad
                de Google.
                </br> © 2024 JOINVITO Technologies Inc.</p>
        </footer>
</div>

</body>

</html>
