@extends('layouts.main')


@section('content')
    <div class="container provider-home">
        <div class="row margin-top">
            <h2>PROVIDER</h2>
        </div>
        <div class="row">
            <div class="col">
                <h3>PROFILE</h3>
                <a href="{{ action([App\Http\Controllers\ProveedorController::class, 'edit'], ['proveedor' => $proveedor->id_prov]) }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
            </div>
            <div class="col">
                <h3>USE</h3>
                <a href="{{ url('instructions') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            </div>
        </div>
        <h2>MENU</h2>
        <div class="row">
            <div class="col">
                <h3>CREATE</h3>
                <a href="{{ url('menu/create')}}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
            </div>
            <div class="col">
                <h3>LIST</h3>
                <a href="{{ url('menusList') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>ORDERS</h3>
                <a href="{{ url('orders') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            </div>
            <div class="col">
                <h3>STATISTICS</h3>
                <a href="{{ url('') }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
    <a href="{{ action([App\Http\Controllers\ProveedorController::class, 'edit'], ['proveedor' => $proveedor->id_prov]) }}">
@endsection
