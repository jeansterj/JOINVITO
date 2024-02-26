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
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/css/provider.css', 'resources/css/center.css', 'resources/css/rider.css', 'resources/css/app.scss', 'resources/js/app.js', 'resources/js/custom.js'])
</head>



<body class="bg-primary">
{{-- <body class="bg-secondary"> --}}
  <nav class="navbar navbar-expand-lg " style="background-color: #FFCA10;">
    <div class="container-fluid">
    <div class="logo">
              <img src="{{ asset('img/logo_joinvito.png') }}" alt="">  
              </div>   
    @yield('navbar')
      </div>
    </div>
  </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>