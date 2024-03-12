@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="row margin-top">
            <h2>SUPPLIER</h2>
        </div>
        <div class="row">
            <div class="col">
                <h3>PROFILE</h3>
                <a href="{{ url('editProvider') }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
            </div>
            <div class="col">
                <h3>USE</h3>
                <a href="{{ url('instructions') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            </div>
        </div>
        <h2>PROVIDER PROFILE</h2>
        <div class="row">
            <div class="col">
                <h3>CREATE</h3>
                <a href="{{ url('createMenu') }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
            </div>
            <div class="col">
                <h3>ORDER</h3>
                <a href="{{ url('menusList') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>ORDER</h3>
                <a href="{{ url('orders') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            </div>
            <div class="col">
                <h3>STATISTICS</h3>
                <a href="{{ url('') }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
