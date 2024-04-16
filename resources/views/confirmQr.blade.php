@extends('layouts.main')
@section('title')
    Home - JoInvitoCorrect
@endsection
@include('layouts.navbarLayout')
@section('content')
    <div class="container-form" id="riderDiv">
        <form class="registerForm"
            action="{{ action([App\Http\Controllers\QrCodeController::class, 'show']) }}" method="GET">
            @csrf
            <input id="" name="idProv" type="hidden" value="{{Auth::user()->id_usu }}"/>
            <input id="" name="idRider" type="hidden" value="{{$data['idRider']}}" />

            <div class="container-fluid">
                <div class="col">
                    <button type="submit" class="btn-light btn_login" name="confirmQr"
                        value="riderForm">Confirmar Qr</button>
                </div>
            </div>
        </form>
    </div>
@endsection