@extends('layouts.main')

@section('content')
<div class="container provider-home">
    <div class="row margin-top">
        <h2>USERS</h2>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ url('show-riders') }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
            <h3>RIDERS</h3>
        </div>
        <div class="col">
            <a href="{{ url('show-providers') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            <h3>PROVEEDORES</h3>
        </div>
        <div class="col">
            <a href="{{ url('show-centro') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            <h3>CENTRO SOCIAL</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ url('show-puntos') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            <h3>PUNTOS</h3>
        </div>
    </div>
</div>
@endsection