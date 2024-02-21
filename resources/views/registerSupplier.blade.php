@extends('layouts.main')

@section('title')
    Register Supplier - JoInvito
@endsection

@section('navbar')


@endsection

@section('content')

<form action="">

<input id="" name="" type="hidden" value="" />

<label for="userName">Nombre Usuario</label>
<input type="text" id="userName">

<label for="email">Email</label>
<input type="email" id="email">

<label for="password">Contraseña</label>
<input type="text" maxlength="50" id="password">

<label for="name">Nombre</label>
<input type="text" id="name">

<label for="lastName">Apellido</label>
<input type="text" id="lastName">

<label for="localName">Nombre Establecimiento</label>
<input type="text" id="localName">

<label for="address">Dirección</label>
<input type="text" id="address">

<label for="floor">Piso</label>
<input type="number" id="floor">

<label for="city">Ciudad</label>
<input type="text" id="city">

<label for="postalCode">Código Postal</label>
<input type="number" id="postalCode">


</form>

@endsection