@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row margin-top text-center">
        <h2>CHANGE INFO</h2>
        <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
        <div class="bg-secondary section-form">
        <form class="registerForm" action="{{ action([App\Http\Controllers\PuntoController::class, 'update'], ['punto' => $punto->id_punto]) }}" method="POST">
                @csrf
                @method('PUT')
                <input id="id_punto" name="" type="hidden" value="{{ $punto->id_punto}}" />
                <div class="container-fluid" id="medForm">
                    <div class="col">
                        <div class="form-group gird-placeContent">
                            <label for="ciudad">Direccion</label>
                            <input class="form-control" type="text" id="direccion" maxlength="250"
                                 required name="ciudad" value="{{ $punto->direccion}}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="direccion">Cantidad personas</label>
                            <input class="form-control" type="text" id="direccion" maxlength="250"
                                 required name="direccion" value="{{ $punto->cantidad_personas}}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="activo">Fecha activo</label>
                            <input type="date" id="activo" name="activo " value="{{ $punto->fecha_alta }}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="inactivo">Fecha inactivo</label>
                            <input type="date" id="inactivo" name="inactivo" value="{{ $punto->fecha_inactivo }}">
                        </div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="Proveedor" {{ $punto->tipo == 'Proveedor' ? 'selected' : '' }}>Proveedor</option>
                            <option value="Centro" {{ $punto->tipo == 'Centro' ? 'selected' : '' }}>Centro</option>
                            <option value="Homeless" {{ $punto->tipo == 'Homeless' ? 'selected' : '' }}>Homeless</option>
                        </select>


                        <button type="submit" class="btn btn-light btn_login" name="supplierFrom">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection