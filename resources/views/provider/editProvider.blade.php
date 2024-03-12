@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row margin-top text-center">
            <h2>CHANGE INFO</h2>
            <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
            <div class="bg-secondary section-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}"
                    method="POST">
                    @csrf
                    <input id="" name="" type="hidden" value="" />
                    <div class="container-fluid" id="medForm">
                        <div class="col">
                            <div class="form-group gird-placeContent">
                                <label for="emailS">Email</label>
                                <input class="form-control" type="text" id="emailS" maxlength="50"
                                    placeholder="Jon@gmail.com" name = "email" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="passwdS">Password</label>
                                <input class="form-control" type="text" id="passwdS" maxlength="50" placeholder="*****"
                                    name = "passwd" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" id="name" maxlength="50" placeholder="Jon"
                                    name = "name" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="lastName">Last Name</label>
                                <input class="form-control" type="text" id="lastName" maxlength="50" placeholder="Doe"
                                    name = "lastName" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="surname">Surname</label>
                                <input class="form-control" type="text" id="surname" maxlength="100" placeholder="Doe"
                                    name = "surname" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="address">Direction</label>
                                <input class="form-control" type="text" id="address" maxlength="250"
                                    placeholder="Barcelona" name = "address" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="floor">Floor (Opcional)</label>
                                <input class="form-control" type="text" id="floor" maxlength="30"
                                    placeholder="Street 24 G" name = "floor" value="floor">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="city">City</label>
                                <input class="form-control" type="text" id="city" maxlength="250"
                                    placeholder="25"required name = "city">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="cpSupplier">Postal Code</label>
                                <input class="form-control" type="text" id="cpSupplier" maxlength="5"
                                    placeholder="09989" required name = "cp">
                            </div>
                            <button type="submit" class="btn btn-light btn_login" name="supplierFrom">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
