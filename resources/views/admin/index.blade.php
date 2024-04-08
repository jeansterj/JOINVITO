@extends('layouts.main')

@section('content')

<a href="{{ url('show-riders') }}"><button></button></a>
<a href="{{ url('show-providers') }}"><button></button></a>
<a href="{{ url('show-centro') }}"><button></button></a>




<div class="container provider-home">
    <div class="row margin-top">
        <h2>EDIT USERS</h2>
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
</div>
@endsection