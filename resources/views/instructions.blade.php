@extends('layouts.main')

@section('content')
    <h1 class="text-center text-white py-4"> INSTRUCTIONS </h1>
    <div class="d-flex align-items-center justify-content-center py-2"><img src="{{ asset('img/instructionIconCircle.svg') }}"
            alt=""></div>

    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <div class="bg-light buttonOrder text-center widthOptions my-2">
                    <h2 class="px-2">How to use the app?</h2>
                </div>


                {{ $rolActivo = Auth::user()->rol->nombre }}


                @switch($rolActivo)
                    @case('rider')
                        <h1 class="text-white">rider</h1>
                        <img src="" alt="videoInstructionsRider">
                    @break

                    @case('centro')
                        <img src="" alt="videoInstructionsCenter">
                        <h1>centro</h1>
                    @break

                    @case('proveedor')
                        <img src="" alt="videoInstructionsProvider">
                        <h1 class="text-white">provider</h1>
                    @break

                    @default
                        <h1 class="text-white">Admin</h1>
                @endswitch

                <div class="row">
                    <div class="bg-light buttonOrder text-center widthOptions my-2">
                        <h2 class="px-1">How to approach a homeless?</h2>
                    </div>

                    <div class="bg-secondary py-2 buttonOrder d-flex text-white">
                        <div class="col-6">
                            <ul class="list-group list-group-numbered text-white px-3 text-start">
                                <li class="justify-content-between align-items-start py-3">
                                    <div class="row">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold py-2">
                                                <h2>Step 1</h2>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between align-items-start py-3">
                                    <div class="ms-2 me-auto py-2">
                                        <div class="row">
                                            <div class="fw-bold">
                                                <h2>Step 2</h2>
                                            </div>
                                            <p>Donec molestie ornare orci tincidunt luctus.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-group list-group-numbered text-white px-3 text-start">
                                <div class="row">
                                    <li class="d-flex justify-content-between align-items-start py-3">
                                        <div class="ms-2 me-auto py-2">
                                            <div class="fw-bold">
                                                <h2>Step 3</h2>
                                            </div>
                                            <p>Maecenas imperdiet non tellus non ornare. Curabitur aliquet urna et massa iaculis faucibus.</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row">
                                    <li class="d-flex justify-content-between align-items-start py-3 ">
                                        <div class="ms-2 me-auto py-2">
                                            <div class="fw-bold">
                                                <h2>Step 4</h2>
                                            </div>
                                            <p>Integer varius lacus a condimentum fringilla.</p>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>


            </div>
        </div>
    </div>
@endsection
