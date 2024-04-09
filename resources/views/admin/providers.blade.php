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
        @foreach ($providers as $provider)
        <tr>
            <td>{{ $provider->id_prov }}</td>
            <td>{{ $provider->nombre }}</td>
            <td>{{ $provider->usuario->rol->nombre }}</td>
            <td>
              <form class="float-right ml-1" action="{{ action([App\Http\Controllers\ProveedorController::class, 'edit'], ['proveedor' => $provider->id_prov]) }}">
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
                        <input id="" name="rol" type="hidden" value="4" />
                        <div class="container-fluid " id="medForm">
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="emailS">Email</label>
                                    <input class="form-control" type="text" id="emailS" maxlength="50"
                                        placeholder="Jon@gmail.com" name = "email" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="passwdS">Password</label>
                                    <input class="form-control" type="text" id="passwdS" maxlength="50"
                                        placeholder="*****" name = "passwd" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" maxlength="50"
                                        placeholder="Jon" name = "name" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="lastName">Last Name</label>
                                    <input class="form-control" type="text" id="lastName" maxlength="50"
                                        placeholder="Doe" name = "lastName" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="surname">Surname</label>
                                    <input class="form-control" type="text" id="surname" maxlength="100"
                                        placeholder="Doe" name = "surname" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="address">Direction</label>
                                    <input class="form-control" type="text" id="address" maxlength="250"
                                        placeholder="Barcelona" name = "address" required>
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="floor">Floor (Opcional)</label>
                                    <input class="form-control" type="text" id="floor" maxlength="30"
                                        placeholder="Street 24 G" name = "floor" value="floor">
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="city">City</label>
                                    <input class="form-control" type="text" id="city" maxlength="250"
                                        placeholder="25"required name = "city">
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="cpSupplier">Postal Code</label>
                                    <input class="form-control" type="text" id="cpSupplier" maxlength="5"
                                        placeholder="09989" required name = "cp">
                                </div>
                                <button type="submit" class="btn btn-light btn_login" name="supplierFrom"
                                    value="supplierForm">Sign Up</button>
                            </div>
                        </div>
                    </form>  
        </div>
      </div>
    </div>
  </div>
@endsection