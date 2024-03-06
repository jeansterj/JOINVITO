@extends('layouts.main')

@section('contingut')
    
<div class="card">
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\UsuarioController::class,'login']) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" id="user" name="user">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </div>
</div>

@endsection