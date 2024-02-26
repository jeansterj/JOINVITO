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
  <h3>MENU</h3>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" data-type="restaurant" aria-current="page" href="#">RESTAURANTS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" data-type="favorites" href="#">FAVORITES</a>
    </li>
  </ul>
  <div class="card" id="restaurants">
    <div class="card-body">
      <div id="carouselRestaurants" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><span>5</span> PACKS LEFT</h5>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col">
                      <span class="quantity">-</span>
                    </div>
                    <div class="col">
                      <span class="quantity">5</span>
                    </div>
                    <div class="col">
                      <span class="quantity">+</span>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary">GET</button>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><span>4</span> PACKS LEFT</h5>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col">
                      <span class="quantity">-</span>
                    </div>
                    <div class="col">
                      <span class="quantity">4</span>
                    </div>
                    <div class="col">
                      <span class="quantity">+</span>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary">GET</button>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><span>3</span> PACKS LEFT</h5>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col">
                      <span class="quantity">-</span>
                    </div>
                    <div class="col">
                      <span class="quantity">3</span>
                    </div>
                    <div class="col">
                      <span class="quantity">+</span>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary">GET</button>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRestaurants" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselRestaurants" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <div class="card" id="favorites">
    <div class="card-body">
      <div id="carouselFavorites" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><span>5</span> PACKS LEFT</h5>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col">
                      <span class="quantity">-</span>
                    </div>
                    <div class="col">
                      <span class="quantity">5</span>
                    </div>
                    <div class="col">
                      <span class="quantity">+</span>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary">GET</button>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><span>4</span> PACKS LEFT</h5>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col">
                      <span class="quantity">-</span>
                    </div>
                    <div class="col">
                      <span class="quantity">4</span>
                    </div>
                    <div class="col">
                      <span class="quantity">+</span>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary">GET</button>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><span>3</span> PACKS LEFT</h5>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <p class="card-text">Some quick example </p>
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col">
                      <span class="quantity">-</span>
                    </div>
                    <div class="col">
                      <span class="quantity">3</span>
                    </div>
                    <div class="col">
                      <span class="quantity">+</span>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn btn-primary">GET</button>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFavorites" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFavorites" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
@endsection

@section('map')
    <div id="map"></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZnJhbmdhYXIiLCJhIjoiY2x0M2o1bG51MXl1djJycGxoOTMxOWM2cyJ9.OvUbOSJo5uD6WNRmhBcujQ';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            center: [2.173225, 41.388737], // starting position [lng, lat]
            zoom: 13 // starting zoom
        });
    </script>
@endsection

@section('footer')
    <div class="container">

    </div>
@endsection
