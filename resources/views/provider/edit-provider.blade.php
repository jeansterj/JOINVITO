@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row margin-top text-center">
            <h2>CHANGE INFO</h2>
            <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
            <div class="bg-secondary section-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\ProveedorController::class, 'update'], ['proveedor' => $proveedor->id_prov]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input id="id_prov" name="" type="hidden" value="{{ $proveedor->id_prov}}" />
                    <div class="container-fluid" id="medForm">
                        <div class="col">
                            <div class="form-group gird-placeContent">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" id="email" maxlength="50" placeholder="Jon"
                                    name = "email" required value="{{ $proveedor->usuario->email}}">
                            </div>

                            <div class="form-group gird-placeContent">
                                <label for="pass_usu">Contraseña</label>
                                <input class="form-control" type="text" id="pass_usu" maxlength="50" placeholder="Jon"
                                    name = "pass_usu" required value="{{  $proveedor->usuario->pass_usu}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="nombre">Name</label>
                                <input class="form-control" type="text" id="nombre" maxlength="50" placeholder="Jon"
                                    name = "nombre" required value="{{ $proveedor->nombre}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="primer_apellido">Last Name</label>
                                <input class="form-control" type="text" id="primer_apellido" maxlength="50" placeholder="Doe"
                                    name = "primer_apellido" required value="{{ $proveedor->primer_apellido}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="nombre_negocio">Surname</label>
                                <input class="form-control" type="text" id="nombre_negocio" maxlength="100" placeholder="Doe"
                                    name = "nombre_negocio" required value="{{ $proveedor->nombre_negocio}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="direccion">Direction</label>
                                <input class="form-control" type="text" id="direccion" maxlength="250"
                                    placeholder="Barcelona" name = "direccion" required value="{{ $proveedor->direccion}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="piso">Floor (Opcional)</label>
                                <input class="form-control" type="text" id="piso" maxlength="30"
                                    placeholder="Street 24 G" name = "piso" value="floor" value="{{ $proveedor->piso}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="ciudad">City</label>
                                <input class="form-control" type="text" id="ciudad" maxlength="250"
                                    placeholder="25"required name = "ciudad" value="{{ $proveedor->ciudad}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="cp">Postal Code</label>
                                <input class="form-control" type="text" id="cp" maxlength="5"
                                    placeholder="09989" required name = "cp" value="{{ $proveedor->cp}}">
                            </div>
                            <button type="submit" class="btn btn-light btn_login" name="supplierFrom">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
