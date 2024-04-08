@extends('layouts.main')

@section('content')
<table class="table table-users container">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">USERNAME</th>
        <th scope="col">ROL</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($centros as $centro)
        <tr>
            <td>{{ $centro->id_centro }}</td>
            <td>{{ $centro->nombre }}</td>
            <td>{{ $centro->usuario->rol->nombre }}</td>
            <td>
              <form class="float-right ml-1" action="{{ action([App\Http\Controllers\CentroController::class, 'edit'], ['centro' => $centro->id_centro]) }}">
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