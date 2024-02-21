<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
</head>
<nav class="navbar navbar-expand-lg " style="background-color: #FFCA10;">
  <div class="container-fluid">
  <div class="logo">
            <img src="{{ asset('img/logo_joinvito.png') }}" alt="">  
            </div>   
  @yield('navbar')
    </div>
  </div>
</nav>

<body class="bg-primary">
    <div class="container">
        @yield('header')
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>