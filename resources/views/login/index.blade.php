@extends('layouts.main')

@section('title')
    Login - JoInvito
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-12" id="loginDiv">
            <h1>LOGIN</h1>

            <img src="{{ asset('img/loginLogo.svg') }}" alt="">

            <div class="container-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}"
                    method="POST">
                    @csrf
                    <div class="form-group gird-placeContent">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group gird-placeContent">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1"
                            placeholder="Password">
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
                        <div class="carousel-item active">
                            <div class="box">
                                <img src="../public/img/rider_icon.png" alt="rider_icon.png" width="132px">
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
                <div class="container-form">
                    <form class="registerForm" action="">
                        @csrf
                        <input id="" name="" type="hidden" value="" />
                        <div class="container-fluid" id="medForm">
                            <div class="col-3 col-md-7">
                                <div class="form-group gird-placeContent">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" maxlength="50"
                                        placeholder="jondoe@gmail.com" required>
                                </div>

                                <div class="form-group gird-placeContent">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="text" maxlength="50" id="password"
                                        placeholder="1234A*" required>
                                </div>

                                <div class="form-group gird-placeContent">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" maxlength="50"
                                        placeholder="Jon" required>
                                </div>

                                <div class="form-group gird-placeContent">
                                    <label for="lastName">Surname</label>
                                    <input class="form-control" type="text" id="lastName" maxlength="100"
                                        placeholder="Doe" required>
                                </div>

                                <div class="form-group gird-placeContent">
                                    <label for="localName">Company</label>
                                    <input class="form-control" type="text" id="localName" maxlength="250"
                                        placeholder="joinvito"required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group gird-placeContent">
                                    <label for="address">Direction</label>
                                    <input class="form-control" type="text" id="address" maxlength="250"
                                        placeholder="Barcelona"required>
                                </div>

                                <div class="form-group gird-placeContent">
                                    <label for="floor">Floor (Opcional)</label>
                                    <input class="form-control" type="text" id="floor" maxlength="30"
                                        placeholder="Street 24 G">
                                </div>

                                <div class="form-group gird-placeContent">
                                    <label for="city">City</label>
                                    <input class="form-control" type="text" id="city" maxlength="250"
                                        placeholder="25"required>
                                </div>

                                <div class="form-group gird-placeContent">
                                    <label for="postalCode">Postal Code</label>
                                    <input class="form-control" type="text" id="postalCode" maxlength="5"
                                        placeholder="09989" required>
                                </div>

                                <button type="submit" class="btn btn-light btn_login">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
