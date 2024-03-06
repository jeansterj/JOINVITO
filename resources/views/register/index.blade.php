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
                           <label for="emailS">Email</label>
                           <input class="form-control" type="text" id="emailS" maxlength="50"
                              placeholder="Jon@gmail.com"  name = "email" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="passwdS">Password</label>
                           <input class="form-control" type="text" id="passwdS" maxlength="50"
                              placeholder="*****"  name = "passwd" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="name">Name</label>
                           <input class="form-control" type="text" id="name" maxlength="50"
                              placeholder="Jon"  name = "name" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="lastName">Last Name</label>
                           <input class="form-control" type="text" id="lastName" maxlength="50"
                              placeholder="Doe"  name = "lastName" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="surname">Surname</label>
                           <input class="form-control" type="text" id="surname" maxlength="100"
                              placeholder="Doe"  name = "surname" required>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group gird-placeContent">
                           <label for="address">Direction</label>
                           <input class="form-control" type="text" id="address" maxlength="250"
                              placeholder="Barcelona"  name = "address" required>
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
                           <label for="cpSupplier">Postal Code</label>
                           <input class="form-control" type="text" id="cpSupplier" maxlength="5"
                              placeholder="09989" required  name = "cp">
                        </div>
                        <button type="submit" class="btn btn-light btn_login" name="supplierFrom" >Sign Up</button>
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
                           <label for="emailR">Email</label>
                           <input class="form-control" type="text" id="emailR" maxlength="50"
                              placeholder="Jon@gmail.com"  name = "email" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="passwdR">Password</label>
                           <input class="form-control" type="text" id="passwdR" maxlength="50"
                              placeholder="*****"  name = "passwd" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="nameRider">Name</label>
                           <input class="form-control" type="text" id="nameRider" maxlength="50"
                              placeholder="Jon" name = "name" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="lastName">Last Name</label>
                           <input class="form-control" type="text" id="lastName" maxlength="50"
                              placeholder="Doe" name = "lastName" required>
                        </div>
                        <!-- <div class="form-group gird-placeContent">
                           <label for="latitude">Latitude</label>
                           <input class="form-control" type="text" id="latitude" maxlength="50"
                              placeholder="" name = "latitude" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="longitude">Long</label>
                           <input class="form-control" type="text" id="longitude" maxlength="50"
                              placeholder="" name = "longitude" required>
                        </div> -->
                        <button type="submit" class="btn btn-light btn_login" name="riderFrom" >Sign Up</button>
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
                           <label for="emailC">Email</label>
                           <input class="form-control" type="text" id="emailC" maxlength="50"
                              placeholder="Jon@gmail.com"  name = "email" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="passwdC">Password</label>
                           <input class="form-control" type="text" id="passwdC" maxlength="50"
                              placeholder="****"  name = "passwd" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="nameCenter">Name</label>
                           <input class="form-control" type="text" id="nameCenter" maxlength="50"
                              placeholder="Jon"  name = "name" required>
                        </div>
                        <div class="col-3">
                        <div class="form-group gird-placeContent">
                           <label for="addressC">Direction</label>
                           <input class="form-control" type="text" id="addressC" maxlength="250"
                              placeholder="Barcelona"  name = "address" required>
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="floorC">Floor (Opcional)</label>
                           <input class="form-control" type="text" id="floorC" maxlength="30"
                              placeholder="Street 24 G"  name = "floor" value="floor">
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="cityC">City</label>
                           <input class="form-control" type="text" id="cityC" maxlength="250"
                              placeholder="25"required  name = "city">
                        </div>
                        <div class="form-group gird-placeContent">
                           <label for="cpC">Postal Code</label>
                           <input class="form-control" type="text" id="cpC" maxlength="5"
                              placeholder="09989" required  name = "cp">
                        </div>
                        
                        <button type="submit" class="btn btn-light btn_login" name="sCenterFrom" >Sign Up</button>
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