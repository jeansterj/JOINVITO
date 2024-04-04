@extends('layouts.main')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">username</th>
        <th scope="col">Rol</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($riders as $rider)
        <tr>
            <td>{{ $rider->id_rider }}</td>
            <td>{{ $rider->nombre }}</td>
            <td>{{ $rider->usuario->rol->nombre }}</td>
          </tr>   
        @endforeach
    </tbody>
  </table>   
@endsection