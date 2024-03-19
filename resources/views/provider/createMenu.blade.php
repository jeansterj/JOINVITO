@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="row margin-top text-center">
            <h2>CREATE MENU</h2>
            <img class="rider-logo" src="{{ asset('img/createMenuIcon.svg') }}" alt="">
            <div class="bg-secondary section-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}"
                    method="POST">
                    @csrf
                    <input id="" name="" type="hidden" value="" />
                    <div class="container-fluid" id="medForm">
                        <div class="col">
                            <div class="form-group gird-placeContent">
                                <label for="plate1">Plate 1</label>
                                <input class="form-control" type="text" id="plate1" maxlength="50" placeholder="Pasta"
                                    name = "plate1" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="plate2">Plate 2</label>
                                <input class="form-control" type="text" id="plate2" maxlength="50" placeholder="Pizza"
                                    name = "plate2" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="drink">Drink</label>
                                <input class="form-control" type="text" id="drink" maxlength="50"
                                    placeholder="Cocacola" name = "drink" required>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="amount">Amount</label>
                                <input class="form-control" type="number" id="amount" maxlength="2" value="0"
                                    name = "amount" required>
                            </div>
                            <button type="submit" class="btn btn-light btn_login" name="supplierFrom">TO REGISTER
                                MENU</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    
@endsection
