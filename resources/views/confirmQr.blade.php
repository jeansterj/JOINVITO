@extends('layouts.main')
@section('title')
    Home - JoInvitoCorrect
@endsection
@include('layouts.navbarLayout')
@endsection
@section('content')
    <div class="container-form" id="riderDiv">
        <form class="registerForm"
            action="{{ action([App\Http\Controllers\QrCodeController::class, 'show']) }}" method="POST">
            @csrf
            <input id="" name="rol" type="hidden" value="{{Auth::user()->id_usu }}"/>
            <input id="" name="rol" type="hidden" value="{{Auth::user()->id_usu }}" />

            <div class="container-fluid " id="medForm">
                <div class="col">
                    <button type="submit" class="btn-light btn_login" name="riderForm"
                        value="riderForm">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
@endsection()