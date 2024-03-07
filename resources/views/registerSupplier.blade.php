@extends('layouts.main')

@section('title')
    Register Supplier - JoInvito
@endsection

{{-- @section('navbar')
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<img src="{{ asset('img/menuCorto.svg') }}" alt="">
</button>
<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">HOME</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">ABOUT US</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">CONTACT</a>
    </li>
    <div>
        @if (Auth::check() && (Auth::user()->rol->nombre == 'admin' || Auth::user()->rol->nombre == 'rider' || Auth::user()->rol->nombre == 'centro'))
            <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false">Logout</a>
        @else
            <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}" alt="">Login</button></a>
            <button type="button" class="btn btn-signup">Sign up</button>
        @endif
    </div>
</ul>
</div>

@endsection --}}

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