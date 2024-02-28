@extends('layouts.main')

@section('navbar')
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <img src="{{ asset('img/burguer-menu.png') }}" alt="">
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
      <button type="button" class="btn btn-login"><img src="img/user.png" alt="">Login</button>
      <button type="button" class="btn btn-signup">Sign up</button>
    </div>
  </ul>
  @endsection

@section('content')
  <div class="container">

    <div>
        <h1>GET ORDER NOW</h1>
    </div>
    <div>
        <img src="" alt="riderMot">
        <h1>THERE ARE NO ORDERS </h1>
    </div>

    <div>
        <div class="container">
            <p>PROV1</p> 
            <p>CHEESE BURGUER</p>
            <p>FISH</p>
            <p>COCA-COLA</p>
        </div>

        <div>
            <p>RIDER CODE</p>
            <p>#17454586J</p>
        </div>

        <div>
            <button><img src="" alt="QR"></button>
        </div>
        
    </div>

@endsection

@section('map')
    <div class="container">
        <div id="map"></div>
    </div>
@endsection

