@extends('layouts.main')

@section('title')
    Register Supplier - JoInvito
@endsection

@section('navbar')


@endsection

@section('content')

<div>

    <h1>Register</h1>

<h4>SUPPLIER REGISTER</h4>

<form action="">

<input id="" name="" type="hidden" value="" />

<label for="email">Email</label>
<input class="form-control" type="email" id="email" maxlength="50" placeholder="jondoe@gmail.com" required>

<label for="password">Password</label>
<input class="form-control" type="text" maxlength="50" id="password" placeholder="1234A*" required>

<label for="name">Name</label>
<input class="form-control" type="text" id="name" maxlength="50" placeholder="Jon" required>

<label for="lastName">Surname</label>
<input class="form-control" type="text" id="lastName" maxlength="100" placeholder="Doe" required>

<label for="localName">Company</label>
<input class="form-control" type="text" id="localName" maxlength="250" placeholder="joinvito"required>

<label for="address">Direction</label>
<input class="form-control" type="text" id="address" maxlength="250" placeholder="Barcelona"required>

<label for="floor">Floor (Opcional)</label>
<input class="form-control" type="text" id="floor" maxlength="30" placeholder="Street 24 G">

<label for="city">City</label>
<input class="form-control" type="text" id="city" maxlength="250" placeholder="25"required>

<label for="postalCode">Postal Code</label>
<input class="form-control" type="text" id="postalCode" maxlength="5" placeholder="09989" required>

<button type="submit">Sing Up</button>
</div>

<div>

    <h1>Register</h1>

<h4>S.CENTER REGISTER</h4>

<form action="">

<input id="" name="" type="hidden" value="" />

<label for="email">Email</label>
<input class="form-control" type="email" id="email" maxlength="50" placeholder="jondoe@gmail.com" required>

<label for="password">Password</label>
<input class="form-control" type="text" maxlength="50" id="password" placeholder="1234A*" required>

<label for="name">Name</label>
<input class="form-control" type="text" id="name" maxlength="50" placeholder="Jon" required>

<label for="address">Direction</label>
<input class="form-control" type="text" id="address" maxlength="250" placeholder="Barcelona"required>

<label for="floor">Floor (Opcional)</label>
<input class="form-control" type="text" id="floor" maxlength="30" placeholder="Street 24 G">

<label for="city">City</label>
<input class="form-control" type="text" id="city" maxlength="250" placeholder="25"required>

<label for="postalCode">Postal Code</label>
<input class="form-control" type="text" id="postalCode" maxlength="5" placeholder="09989" required>

<button type="submit">Sing Up</button>
</div>


</form>

@endsection