@extends('layouts.main')
@section('title')
Register Supplier - JoInvito
@endsection
@section('navbar')
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
        <button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}" alt="">Login</button>
        <button type="button" class="btn btn-signup">Sign up</button>
    </div>
</ul>
</div>
   @endsection
   @section('content')
   <div class="container-fluid">
      <div class="col-12" id="loginDiv">
         <h1>LOGIN</h1>
         <img src="{{ asset('img/loginLogo.svg') }}" alt="">
         <div class="container-form">
            <form class="registerForm">
               <div class="form-group gird-placeContent">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
               </div>
               <div class="form-group gird-placeContent">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
               </div>
               <button type="submit" class="btn btn-light btn_login">Sign Up</button>
            </form>
            <div class="accountQuestion">
               <p class="p text-break">Don't have an account</p>
               <button class="dontHaveAccount text-break">Create account</button>
            </div>
         </div>
      </div>
      <div class="col-9 bg-secondary" id="register">
         <div class="container">
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
                  <div class="carousel-item active" id="riderIcon">
                     <div class="box">
                        <img src="../public/img/rider_icon.png" alt="rider_icon.png" width="132px" >
                        <figcaption>RIDER</figcaption>
                     </div>
                  </div>
                  <div class="carousel-item" id="supplierIcon">
                     <div class="box">
                        <img src="../public/img/supplier_icon.png" alt="supplier_icon.png">
                        <figcaption>SUPPLIER</figcaption>
                     </div>
                  </div>
                  <div class="carousel-item" id="sCenterIcon">
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
            <div class="container-form" id="supplierDiv">
               <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
                  @csrf
                  <input id="" name="" type="hidden" value="" />
                  <div class="container-fluid" id="medForm">
                     <div class="col-3 col-md-7">
                        <div class="form-group gird-placeContent">
                           <label for="email">Email</label>
                           <input class="form-control" type="email" id="email" maxlength="50"
                              placeholder="jondoe@gmail.com"  name = "email" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="password">Password</label>
                           <input class="form-control" type="text" maxlength="50" id="password"
                              placeholder="1234A*"  name = "password" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="name">Name</label>
                           <input class="form-control" type="text" id="name" maxlength="50"
                              placeholder="Jon"  name = "name" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="lastName">Surname</label>
                           <input class="form-control" type="text" id="lastName" maxlength="100"
                              placeholder="Doe"  name = "surname" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="localName">Company</label>
                           <input class="form-control" type="text" id="localName" maxlength="250"
                              placeholder="joinvito" name = "company" required>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group gird-placeContent">
                           <label for="address">Direction</label>
                           <input class="form-control" type="text" id="address" maxlength="250"
                              placeholder="Barcelona"  name = "direction" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="floor">Floor (Opcional)</label>
                           <input class="form-control" type="text" id="floor" maxlength="30"
                              placeholder="Street 24 G"  name = "floor" value="floor">
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="city">City</label>
                           <input class="form-control" type="text" id="city" maxlength="250"
                              placeholder="25"required  name = "city">
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="postalCode">Postal Code</label>
                           <input class="form-control" type="text" id="postalCode" maxlength="5"
                              placeholder="09989" required  name = "postalCode">
                        </div>
                        <button type="submit" class="btn btn-light btn_login" name="supplierFrom" value="supplierForm">Sign Up</button>
                     </div>
                  </div>
               </form>
            </div>
            {{-- RIDER --}}
            <div class="container-form" id="riderDiv">
               <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
                  @csrf
                  <input id="" name="" type="hidden" value="" />
                  <div class="container-fluid" id="medForm">
                     <div class="col-3 col-md-7">
                        <div class="form-group gird-placeContent">
                           <label for="emailRider">Email</label>
                           <input class="form-control" type="email" id="emailRider" maxlength="50"
                              placeholder="jondoe@gmail.com" name = "email" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="passwordRider">Password</label>
                           <input class="form-control" type="text" maxlength="50" id="passwordRider"
                              placeholder="1234A*" name = "password" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="nameRider">Name</label>
                           <input class="form-control" type="text" id="nameRider" maxlength="50"
                              placeholder="Jon" name = "name" required>
                        </div>
                        <button type="submit" class="btn btn-light btn_login" name="riderFrom" value="riderForm">Sign Up</button>
                     </div>
                  </div>
               </form>
            </div>
            {{-- S.CENTER --}}
            <div class="container-form" id="sCenterDiv">
               <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
                  @csrf
                  <input id="" name="" type="hidden" value="" />
                  <div class="container-fluid" id="medForm">
                     <div class="col-3 col-md-7">
                        <div class="form-group gird-placeContent">
                           <label for="emailCenter">Email</label>
                           <input class="form-control" type="email" id="emailCenter" maxlength="50"
                              placeholder="jondoe@gmail.com" name = "email" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="passwordCenter">Password</label>
                           <input class="form-control" type="text" maxlength="50" id="passwordCenter"
                              placeholder="1234A*"  name = "password" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="nameCenter">Name</label>
                           <input class="form-control" type="text" id="nameCenter" maxlength="50"
                              placeholder="Jon"  name = "name" required>
                        </div>
                        <button type="submit" class="btn btn-light btn_login" name="sCenterFrom" value="sCenterForm">Sign Up</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="../resources/js/carrouselMovement.js"></script>
@endsection