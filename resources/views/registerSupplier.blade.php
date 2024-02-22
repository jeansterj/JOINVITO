@extends('layouts.main')

@section('title')
    Register Supplier - JoInvito
@endsection

@section('navbar')


@endsection

@section('content')

<form action="">

<input id="" name="" type="hidden" value="" />

<label for="email">Email</label>
<input type="email" id="email" maxlength="50">

<label for="password">Contraseña</label>
<input type="text" maxlength="50" id="password">

<label for="name">Nombre</label>
<input type="text" id="name" maxlength="50">

<label for="lastName">Apellido</label>
<input type="text" id="lastName" maxlength="100">

<label for="localName">Nombre Establecimiento</label>
<input type="text" id="localName" maxlength="250">

<label for="address">Dirección</label>
<input type="text" id="address" maxlength="250">

<label for="floor">Piso</label>
<input type="text" id="floor" maxlength="30">

<label for="city">Ciudad</label>
<input type="text" id="city" maxlength="250">

<label for="postalCode">Código Postal</label>
<input type="text" id="postalCode" maxlength="5">

<button type="submit">Sing Up</button>

</form>

@endsection