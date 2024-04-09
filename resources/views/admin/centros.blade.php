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
                        <input id="" name="rol" type="hidden" value="3" />
                        <div class="container-fluid " id="medForm">
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="emailC">Email</label>
                                    <input class="form-control" type="text" id="emailC" maxlength="50"
                                        placeholder="Jon@gmail.com" name = "email" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="passwdC">Password</label>
                                    <input class="form-control" type="text" id="passwdC" maxlength="50"
                                        placeholder="****" name = "passwd" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="nameCenter">Name</label>
                                    <input class="form-control" type="text" id="nameCenter" maxlength="50"
                                        placeholder="Jon" name = "name" required>
                                </div>
                                <div class="col">
                                    <div class="form-group gird-placeContent">
                                        <label for="addressC">Direction</label>
                                        <input class="form-control" type="text" id="addressC" maxlength="250"
                                            placeholder="Barcelona" name = "address" required>
                                    </div>
                                    <div class="form-group gird-placeContent">
                                        <label for="floorC">Floor (Opcional)</label>
                                        <input class="form-control" type="text" id="floorC" maxlength="30"
                                            placeholder="Street 24 G" name = "floor">
                                    </div>
                                    <div class="form-group gird-placeContent">
                                        <label for="cityC">City</label>
                                        <input class="form-control" type="text" id="cityC" maxlength="250"
                                            placeholder="25"required name = "city">
                                    </div>
                                    <div class="form-group gird-placeContent">
                                        <label for="cpC">Postal Code</label>
                                        <input class="form-control" type="text" id="cpC" maxlength="5"
                                            placeholder="09989" required name = "cp">
                                    </div>

                                    <button type="submit" class="btn btn-light btn_login" name="sCenterForm"
                                        value="sCenterForm">Sign Up</button>
                                </div>
                            </div>
                    </form>   
        </div>
      </div>
    </div>
  </div>
@endsection