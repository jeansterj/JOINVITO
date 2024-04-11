@extends('layouts.main')
@section('title')
    Home - JoInvito
@endsection
@include('layouts.navbarLayout')

{{-- <div class="navbarBody"> --}}
    {{-- @yield('navbarContent') --}}
    {{-- @yield('img') --}}
{{-- </div> --}}
{{-- @section('navbar')
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<img src="{{ asset('img/menuCorto.svg') }}" alt="">
</button>
<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">HOME</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">ABOUT US</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">CONTACT</a>
    </li>
    <div>
        @if (Auth::check() && (Auth::user()->rol->nombre == 'admin' || Auth::user()->rol->nombre == 'rider' || Auth::user()->rol->nombre == 'centro'))
            <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false">Logout</a>
        @else
            <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}" alt="">Login</button></a>
            <button type="button" class="btn btn-signup">Sign up</button>
        @endif
        
    </div>
</ul>
</div>
@endsection --}}
@section('esfera')
<div class="esfera1"></div>

@endsection
@section('content')
<div class="landingBody">
    <h2>WAYS TO HELP</h2>
    <div class="container container-2">
        <div class="row">
          <div class="col-sm">
            <img src="../public/img/rider_icon.png" class="img" id="riderIconLanding">
            <h3>Rider</h3>
            <p class="textHelp">The rider take the food from the suppliers and gives it to the homeless pepole.</p>
          </div>
          <div class="col-sm">
            <img src="../public/img/supplier_icon.png" alt="" class="img">
            <h3>Supplier</h3>
            <p class="textHelp">The supplier give food to the rider to help homeless pepole.</p>
          </div>
          <div class="col-sm">
            <img src="../public/img/sCenter_icon.png" alt="" class="img">
            <h3>S.Center</h3>
            <p class="textHelp">The social center will be able to use the rider's food to help homeless pepole who are in the social center.</p>
          </div>
        </div>
      </div>
    <div class="waysToHelp sponsorsDiv">        
        <span class="navbarWaysHelp sponsors">
            <img src="../public/img/sponsor-1.png" alt="sponsor-1.png" class="sponsorsImg">
        </span>
        <span class="navbarWaysHelp sponsors">
            <img src="../public/img/sponsor-1.png" alt="sponsor-2.png" class="sponsorsImg">
        </span>
        <span class="navbarWaysHelp sponsors">
            <img src="../public/img/sponsor-1.png" alt="sponsor-1.png" class="sponsorsImg">
        </span>
    </div>
    <div class="waysToHelp slogan">
        <h2>"You are not invisible"</h2>
        <p class="sloganText">The principal cause for this project is to help all the homeless to have a eat all the days and the same treatment cause we all are humans, we are not better.</p>
        <p class="phrase">“Humility will open more doors than arrogance ever will”</p>
        <figcaption class="phrase">- Zig Ziglar -</figcaption>
    </div>
</div>

@endsection
