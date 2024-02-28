<!DOCTYPE html>
<html lang="en">
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
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/css/provider.css', 'resources/css/center.css', 'resources/css/rider.css', 'resources/css/app.scss', 'resources/js/app.js', 'resources/js/custom.js', 'resources/js/rider.js'])
</head>



<body class="bg-primary">
{{-- <body class="bg-secondary"> --}}
  <nav class="navbar navbar-expand-lg " style="background-color: #FFCA10;">
    <div class="container-fluid">
      <button class="navbar-toggler userButton" type="button" data-bs-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="{{ asset('img/user.png') }}" alt="">
      </button>
    <div class="logo">
              <img src="{{ asset('img/JoInvitoLogo.svg') }}" alt="">
              </div>
    @yield('navbar')
    </div>
  </nav>
  @yield('content')
      
  @yield('map')
<footer>
  <p>JOINVITO</p>
  <p>Este sitio está protegido por reCAPTCHA y se aplican las Condiciones de servicio y la Política de privacidad de Google.
    © 2024 JOINVITO Technologies Inc.</p>
</footer>

</body>
</html>
