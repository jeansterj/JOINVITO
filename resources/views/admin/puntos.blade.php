@extends('layouts.main')

@section('content')
<table class="table table-users container">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">LATITUD</th>
        <th scope="col">LONGITUD</th>
        <th scope="col">PERSONAS</th>
        <th scope="col">FECHA ALTA</th>
        <th scope="col">TIPO</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($puntos as $punto)
        <tr>
            <td>{{ $punto->id_punto }}</td>
            <td>{{ $punto->direccion }}</td>
            <td>{{ $punto->latitud }}</td>
            <td>{{ $punto->longitud }}</td>
            <td>{{ $punto->cantidad_personas }}</td>
            <td>{{ $punto->fecha_alta }}</td>
            <td>{{ $punto->tipo }}</td>
            <td>
              <form class="float-right ml-1" action="{{ action([App\Http\Controllers\PuntoController::class, 'edit'], ['punto' => $punto->id_punto]) }}">
              @csrf

                <button type="submit" class="btn btn-sm btn-light"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
              </form>
            </td>
            <td>
              <form class="float-right ml-1">
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
              </form>
            </td>
          </tr>   
        @endforeach
    </tbody>
  </table>  
  <p class="d-inline-flex gap-1">
    <a class="btn btn-light" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">CREAR NUEVA UBICACION</a>
  </p>
  <div class="row">
    <div class="col">
      <div class="collapse multi-collapse" id="multiCollapseExample1">
        <div>
          <form class="registerForm" action="{{ action([App\Http\Controllers\PuntoController::class, 'store'])}}" method="POST">
            @csrf
            @method('PUT')
            <input id="id_punto" name="" type="hidden"/>
            <div class="container-fluid" id="medForm">
                <div class="col">
                    <div class="form-group gird-placeContent">
                        <label for="ciudad">Direccion</label>
                        <input class="form-control" type="text" id="direccion" maxlength="250"
                             required name="ciudad">
                    </div>
                    <div class="form-group gird-placeContent">
                        <label for="direccion">Cantidad personas</label>
                        <input class="form-control" type="text" id="direccion" maxlength="250"
                             required name="direccion">
                    </div>
                    <div class="form-group gird-placeContent">
                        <label for="activo">Fecha activo</label>
                        <input type="date" id="activo" name="activo ">
                    </div>
                    <div class="form-group gird-placeContent">
                        <label for="inactivo">Fecha inactivo</label>
                        <input type="date" id="inactivo" name="inactivo" >
                    </div>
                    <div class="form-group gird-placeContent">
                        <select class="form-select" aria-label="Default select example">
                            <option value="Proveedor">Proveedor</option>
                            <option value="Centro">Centro</option>
                            <option value="Homeless">Homeless</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-light btn_login" name="supplierFrom">SAVE</button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection