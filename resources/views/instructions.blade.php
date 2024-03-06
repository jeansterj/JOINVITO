@extends('layouts.main')


@section('navbar')
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
                <button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}"
                        alt="">Login</button>
                <button type="button" class="btn btn-signup">Sign up</button>
            </div>
        </ul>
    </div>
@endsection

@section('content')

<h1 class="text-center text-white py-4"> INSTRUCTIONS </h1>
<div class="d-flex align-items-center justify-content-center py-2"><img  src="{{ asset('img/instructionIconCircle.svg') }}" alt=""></div>


<div class="bg-light buttonOrder text-center widthOptions my-2">
    <h2 class="px-2">How to use the app?</h2>
</div>


{{-- @switch()
    @case(1)

        @break
    @case(2)
    <img src="" alt="videoInstructionsProvider">

        @break
    @default
    <img src="" alt="videoInstructionsSocialCenter">

@endswitch --}}

<img src="" alt="videoInstructionsRider">


<div class="bg-light buttonOrder text-center widthOptions my-2"><h2 class="px-1">How to approach a homeless?</h2></div>

<div class="bg-secondary py-2 buttonOrder">

    <ul class="list-group list-group-numbered text-white px-3">
        <li class=" d-flex justify-content-between align-items-start py-3">
          <div class="ms-2 me-auto">
            <div class="fw-bold py-2"><h2>Step 1</h2></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </li>
        <li class="d-flex justify-content-between align-items-start py-3">
          <div class="ms-2 me-auto py-2">
            <div class="fw-bold"><h2>Step 2</h2></div>
            <p>Donec molestie ornare orci tincidunt luctus.</p>
            
          </div>
        </li>
        <li class="d-flex justify-content-between align-items-start py-3">
          <div class="ms-2 me-auto py-2">
            <div class="fw-bold"><h2>Step 3</h2></div>
           <p> Maecenas imperdiet non tellus non ornare.
            Curabitur aliquet urna et massa iaculis faucibus.</p>
            </div>
        </li>
        <li class="d-flex justify-content-between align-items-start py-3">
            <div class="ms-2 me-auto py-2">
              <div class="fw-bold"><h2>Step 4</h2></div>
              <p>Integer varius lacus a condimentum fringilla.</p>
            </div>
          </li>
      </ul>

</div>



@endsection