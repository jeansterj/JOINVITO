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
@endsection