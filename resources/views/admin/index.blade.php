@extends('layouts.main')

@section('content')
<div class="container adminHome">
    <div class="row margin-top">
        <h2>INFORMACIÓN DE LOS USUARIOS</h2>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ url('show-riders') }}"> <img src="{{ asset('img/rider_icon.png') }}" alt="" class="adminImage"></a>
            <h3>RIDERS</h3>
        </div>
        <div class="col">
            <a href="{{ url('show-providers') }}"> <img src="{{ asset('img/supplier_icon.png') }}" alt="" class="adminImage"></a>
            <h3>PROVEEDORES</h3>
        </div>
        <div class="col">
            <a href="{{ url('show-centro') }}"> <img src="{{ asset('img/sCenter_icon.png') }}" alt="" class="adminImage"></a>
            <h3>CENTRO SOCIAL</h3>
        </div>
    </div>
    <div class="row margin-top adminTop">
        <h2>INFORMACIÓN DE LAS UBICACIONES</h2>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ url('show-puntos') }}"> <img src="{{ asset('img/location_icon.png') }}" alt="" class="adminImage"></a>
            <h3>PUNTOS</h3>
        </div>
    </div>
</div>
@endsection