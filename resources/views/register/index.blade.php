@extends('layouts.main')

@section('title')
    Register Supplier - JoInvito
@endsection

@section('navbar')


@endsection

@section('content')
    <h1>REGISTER</h1>
    <h2>CHOOSE USER TYPE</h2>
    {{-- <div class="forms">
        <div class="rider formSelectorIcon">
            <img src="../public/img/rider_icon.png" alt="rider_icon.png" width="132px">
            <figcaption>RIDER</figcaption>
        </div>
        <div class="supplier formSelectorIcon">
            <img src="../public/img/supplier_icon.png" alt="rider_icon.png" width="111px">
            <figcaption>SUPPLIER</figcaption>
        </div>
    </div> --}}
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
          </button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
            {{-- <figcaption>SUPPLIER</figcaption> --}}
          </button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../public/img/rider_icon.png" alt="rider_icon.png" width="132px" >
            <figcaption>RIDER</figcaption>
          </div>
          <div class="carousel-item">
            <img src="../public/img/supplier_icon.png" alt="supplier_icon.png" width="111px">
            <figcaption>SUPPLIER</figcaption>
          </div>
          <div class="carousel-item">
            <img src="../public/img/sCenter_icon.png" alt="sCenter_icon.png" width="111px">
            <figcaption>S.CENTER</figcaption>
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
    <form class="registerForm">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-light">Submit</button>
    </form>
@endsection