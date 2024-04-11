@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row margin-top text-center">
        <h2>CHANGE INFO RIDER</h2>
        <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
        <div class="bg-secondary section-form">
            <form class="registerForm" action="{{ action([App\Http\Controllers\RiderController::class, 'update'], ['rider' => $rider->id_rider]) }}" method="POST">
                @csrf
                @method('PUT')
                <input id="" name="" type="hidden" value="{{ $rider->id_rider}}" />
                <div class="container-fluid" id="medForm">
                    <div class="col">
                        <div class="form-group gird-placeContent">
                            <label for="nombre">Name</label>
                            <input class="form-control" type="text" id="nombre" maxlength="50" placeholder="Jon"
                                name = "nombre" required value="{{ $rider->nombre}}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="primer_apellido">Last Name</label>
                            <input class="form-control" type="text" id="primer_apellido" maxlength="50" placeholder="Doe"
                                name = "primer_apellido" required value="{{ $rider->primer_apellido}}">
                        </div>
                        <div class="form-group gird-placeContent">
                            <p>Usuario habilitado</p>
                            <label class="switch">
                                <input type="checkbox" id="estado" name="estado" {{$rider->usuario->estado== 1 ? 'checked' : '' }}>
                                <span class="slider round"></span>
                              </label>
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