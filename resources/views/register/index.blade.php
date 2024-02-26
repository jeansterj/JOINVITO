@extends('layouts.main')

@section('title')
    Register Supplier - JoInvito
@endsection

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
    <h1>REGISTER</h1>
    <h2>CHOOSE USER TYPE</h2>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
          </button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
          </button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <img src="../public/img/rider_icon.png" alt="rider_icon.png" width="132px" >
              <figcaption>RIDER</figcaption>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <img src="../public/img/supplier_icon.png" alt="supplier_icon.png">
              <figcaption>SUPPLIER</figcaption>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <img src="../public/img/sCenter_icon.png" alt="sCenter_icon.png" width="111px">
              <figcaption>S.CENTER</figcaption>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="container-form">
        <form class="registerForm">
          <div class="form-group gird-placeContent">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group gird-placeContent">
            <label for="exampleInputPassword1" >Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-light btn_login">Sign Up</button>
          </form>
        <div class="accountQuestion">
          <p class="p">Don't have an account</p>
          <a href="" class="dontHaveAccount">Create account</a>
        </div>
      </div>
@endsection