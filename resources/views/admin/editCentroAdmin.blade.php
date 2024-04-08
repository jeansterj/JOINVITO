@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row margin-top text-center">
            <h2>CHANGE INFO CENTER</h2>
            <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
            <div class="bg-secondary section-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\CentroController::class, 'update'], ['centro' => $centro->id_centro]) }}" method="POST">
                    @csrf
                    @method('PUT')  
                    <input id="id_center" name="" type="hidden" value="{{ $centro->id_centro}}" />
                    <div class="container-fluid" id="medForm">
                        <div class="col">
                            <div class="form-group gird-placeContent">
                                <label for="nombre">Name</label>
                                <input class="form-control" type="text" id="nombre" maxlength="50" 
                                    name = "nombre" required  value="{{ $centro->nombre}}"> 
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="direccion">Direccion</label>
                                <input class="form-control" type="text" id="direccion" maxlength="50" 
                                    name = "direccion" required value="{{ $centro->direccion}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="ciudad">Ciudad</label>
                                <input class="form-control" type="text" id="ciudad" maxlength="50" 
                                    name = "ciudad" required value="{{ $centro->ciudad}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="piso">floor</label>
                                <input class="form-control" type="number" id="piso" maxlength="50" 
                                    name = "piso"  value="{{ $centro->piso}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="cp">Postal Code</label>
                                <input class="form-control" type="number" id="cp" maxlength="50" 
                                    name = "cp" required value="{{ $centro->cp}}">
                            </div>
                            <button type="submit" class="btn btn-light btn_login" name="riderFrom"
                                value="riderForm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection