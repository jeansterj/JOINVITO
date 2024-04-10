@extends('layouts.main')

@section('content')
<table class="table table-users container">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">USERNAME</th>
        <th scope="col">ROL</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($riders as $rider)
        <tr>
            <td>{{ $rider->id_rider }}</td>
            <td>{{ $rider->nombre }}</td>
            <td>{{ $rider->usuario->rol->nombre }}</td>
            <td>
              <form class="float-right ml-1" action="{{ action([App\Http\Controllers\RiderController::class, 'edit'], ['rider' => $rider->id_rider]) }}">
              @csrf
                <button type="submit" class="btn btn-sm btn-light"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
              </form>
            </td>
          </tr>   
        @endforeach
    </tbody>
  </table>  
  <p class="d-inline-flex gap-1">
    <a class="btn btn-light" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">CREAR NUEVO USUARIO</a>
  </p>
  <div class="row">
    <div class="col">
      <div class="collapse multi-collapse" id="multiCollapseExample1">
        <div>
          <form class="registerForm"
                        action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
                        @csrf
                        <input id="" name="rol" type="hidden" value="2" />
                        <div class="container-fluid " id="medForm">
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="emailR">Email</label>
                                    <input class="form-control" type="text" id="emailR" maxlength="50"
                                        placeholder="Jon@gmail.com" name = "email" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="passwdR">Password</label>
                                    <input class="form-control" type="text" id="passwdR" maxlength="50"
                                        placeholder="*****" name = "passwd" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="nameRider">Name</label>
                                    <input class="form-control" type="text" id="nameRider" maxlength="50"
                                        placeholder="Jon" name = "name" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="lastName">Last Name</label>
                                    <input class="form-control" type="text" id="lastName" maxlength="50"
                                        placeholder="Doe" name = "lastName" required>
                                </div>
                                <button type="submit" class="btn btn-light btn_login" name="riderForm"
                                    value="riderForm">Sign Up</button>
                            </div>
                        </div>
                    </form>
        </div>
      </div>
    </div>
  </div>
@endsection