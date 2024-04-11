@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row margin-top text-center">
        <h2>CHANGE INFO</h2>
        <div class="bg-secondary section-form">
        <form class="registerForm" action="{{ action([App\Http\Controllers\PuntoController::class, 'update'], ['punto' => $punto->id_punto]) }}" method="POST">
                @csrf
                @method('PUT')
                <input id="id_punto" name="" type="hidden" value="{{ $punto->id_punto}}" />
                <div class="container-fluid" id="medForm">
                    <div class="col">
                        <div class="form-group gird-placeContent">
                            <label for="direccion">Direccion</label>
                            <input class="form-control" type="text" id="direccion" maxlength="250"
                                 required name="direccion" value="{{ $punto->direccion}}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="personas">Cantidad personas</label>
                            <input class="form-control" type="text" id="personas" maxlength="250"
                                 required name="personas" value="{{ $punto->cantidad_personas}}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="alta">Fecha alta</label>
                            <input type="date" id="alta" name="alta " value="{{ $punto->fecha_alta }}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="inactivo">Fecha inactivo</label>
                            <input type="date" id="inactivo" name="inactivo" value="{{ $punto->fecha_inactivo }}">
                        </div>
                        <p>Tipo de punto:</p>
                        <div class="form-group gird-placeContent">
                            <select id="tipo"  name="tipo"  class="form-select" aria-label="Default select example">
                                <option value="Proveedor" {{ $punto->tipo == 'Proveedor' ? 'selected' : '' }}>Proveedor</option>
                                <option value="Centro" {{ $punto->tipo == 'Centro' ? 'selected' : '' }}>Centro</option>
                                <option value="Homeless" {{ $punto->tipo == 'Homeless' ? 'selected' : '' }}>Homeless</option>
                            </select>
                        </div>
                        <p>Punto habilitado</p>
                        <label class="switch">
                            <input type="checkbox" id="estado" name="estado" {{$punto->estado== 1 ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label></br>
                    
                        <button type="submit" class="btn btn-light btn_login" name="supplierFrom">SAVE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection