@extends('layouts.main')

@section('content')
    @include('partials.mensajes')
    <div class="container-fluid login-signup">
        <div class="col-4" id="loginDiv">
            <h1>LOGIN</h1>

            <img src="{{ asset('img/loginLogo.svg') }}" alt="">

            <div class="container-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}"
                    method="POST">
                    @csrf
                    <div class="form-group gird-placeContent">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            placeholder="Enter email" value={{ old('email') }}>
                    </div>
                    <div class="form-group gird-placeContent">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-light btn_login">Login</button>
                </form>
                <div class="accountQuestion d-none" id="divAccountQuestion">
                    <p class="p text-break">Don't have an account</p>
                    <button class="dontHaveAccount text-break btn btn-light btn_login">Create account</button>
                </div>
            </div>
        </div>


        <div class="col-8 bg-secondary" id="register">
            <div class="container">
                <h1 class="registerForm">REGISTER</h1>
                <h2>CHOOSE USER TYPE</h2>
                <div id="carouselExampleIndicators" class="carousel slide carrouselIcons">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="riderIcon">
                            <div class="py-2">
                                <img src="../public/img/rider_icon.png" alt="rider_icon.png" width="132px">
                                <figcaption>RIDER</figcaption>
                            </div>
                        </div>
                        <div class="carousel-item" id="supplierIcon">
                            <div class="py-2">
                                <img src="../public/img/supplier_icon.png" alt="supplier_icon.png">
                                <figcaption>SUPPLIER</figcaption>
                            </div>
                        </div>
                        <div class="carousel-item" id="sCenterIcon">
                            <div class="py-2">
                                <img src="../public/img/sCenter_icon.png" alt="sCenter_icon.png" width="111px">
                                <figcaption>S.CENTER</figcaption>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="container-form" id="supplierDiv">
                    <form class="registerForm"
                        action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
                        @csrf
                        <input id="" name="rol" type="hidden" value="4" />
                        <div class="container-fluid" id="medForm">
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="emailS">Email</label>
                                    <input class="form-control" type="text" id="emailS" maxlength="50"
                                        placeholder="Jon@gmail.com" name = "email" required value={{ old('email') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="passwdS">Password</label>
                                    <input class="form-control" type="text" id="passwdS" maxlength="50"
                                        placeholder="*****" name = "passwd" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" maxlength="50"
                                        placeholder="Jon" name = "name" required value={{ old('name') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="lastName">Last Name</label>
                                    <input class="form-control" type="text" id="lastName" maxlength="50"
                                        placeholder="Doe" name = "lastName" required value={{ old('lastName') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="surname">Surname</label>
                                    <input class="form-control" type="text" id="surname" maxlength="100"
                                        placeholder="Doe" name = "surname" required value={{ old('surname') }}>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="address">Direction</label>
                                    <input class="form-control" type="text" id="address" maxlength="250"
                                        placeholder="Barcelona" name = "address" required value={{ old('address') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="floor">Floor (Opcional)</label>
                                    <input class="form-control" type="text" id="floor" maxlength="30"
                                        placeholder="Street 24 G" name = "floor" value="floor" value={{ old('floor') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="city">City</label>
                                    <input class="form-control" type="text" id="city" maxlength="250"
                                        placeholder="25"required name = "city" value={{ old('city') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="cpSupplier">Postal Code</label>
                                    <input class="form-control" type="text" id="cpSupplier" maxlength="5"
                                        placeholder="09989" required name = "cp" value={{ old('cp') }}>
                                </div>
                                <button type="submit" class="btn btn-light btn_login" name="supplierFrom"
                                    value="supplierForm">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- RIDER --}}
                <div class="container-form" id="riderDiv">
                    <form class="registerForm"
                        action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
                        @csrf
                        <input id="" name="rol" type="hidden" value="2" />
                        <div class="container-fluid " id="medForm">
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="emailR">Email</label>
                                    <input class="form-control" type="email" id="emailR" maxlength="50"
                                        placeholder="Jon@gmail.com" name="email" required value={{ old('surname') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="passwdR">Password</label>
                                    <input class="form-control" type="password" id="passwdR" maxlength="50"
                                        placeholder="*****" name = "passwd" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="nameRider">Name</label>
                                    <input class="form-control" type="text" id="nameRider" maxlength="50"
                                        placeholder="Jon" name = "name" required value={{ old('surname') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="lastName">Last Name</label>
                                    <input class="form-control" type="text" id="lastName" maxlength="50"
                                        placeholder="Doe" name = "lastName" required value={{ old('surname') }}>
                                </div>
                                <button type="submit" class="btn btn-light btn_login" name="riderForm"
                                    value="riderForm">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- S.CENTER --}}
                <div class="container-form" id="sCenterDiv">
                    <form class="registerForm"
                        action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
                        @csrf
                        <input id="" name="rol" type="hidden" value="3" />
                        <div class="container-fluid " id="medForm">
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="emailC">Email</label>
                                    <input class="form-control" type="text" id="emailC" maxlength="50"
                                        placeholder="Jon@gmail.com" name = "email" required value={{ old('email') }}>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="passwdC">Password</label>
                                    <input class="form-control" type="text" id="passwdC" maxlength="50"
                                        placeholder="****" name = "passwd" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="nameCenter">Name</label>
                                    <input class="form-control" type="text" id="nameCenter" maxlength="50"
                                        placeholder="Jon" name = "name" required value={{ old('name') }}>
                                </div>
                                <div class="col">
                                    <div class="form-group gird-placeContent">
                                        <label for="addressC">Direction</label>
                                        <input class="form-control" type="text" id="addressC" maxlength="250"
                                            placeholder="Barcelona" name = "address" required value={{ old('address') }}>
                                    </div>
                                    <div class="form-group gird-placeContent">
                                        <label for="floorC">Floor (Opcional)</label>
                                        <input class="form-control" type="text" id="floorC" maxlength="30"
                                            placeholder="Street 24 G" name = "floor" value={{ old('floor') }}>
                                    </div>
                                    <div class="form-group gird-placeContent">
                                        <label for="cityC">City</label>
                                        <input class="form-control" type="text" id="cityC" maxlength="250"
                                            placeholder="25"required name = "city" value={{ old('city') }}>
                                    </div>
                                    <div class="form-group gird-placeContent">
                                        <label for="cpC">Postal Code</label>
                                        <input class="form-control" type="text" id="cpC" maxlength="5"
                                            placeholder="09989" required name = "cp" value={{ old('cp') }}>
                                    </div>

                                    <button type="submit" class="btn btn-light btn_login" name="sCenterForm"
                                        value="sCenterForm">Sign Up</button>
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
