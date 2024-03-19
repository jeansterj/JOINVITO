@extends('layouts.main')


@section('content')
    <meta name="userId" content="{{ Auth::user()->id_usu }}">
    <div class="text-center text-white my-2">Write the rider’s code or scan it.</div>
    <div class="d-flex justify-content-around">
        <div class="bg-light btnOrdes d-flex text-center my-auto justify-content-center mx-4 px-5">
            <form action="">
                <label for="rider-Code" class="text-secondary">WRITE CODE</label>
                <div class="row">
                    <input type="text" name="rider-Code" id="rider-Code"
                        class="btnOrdes bg-primary text-white py-1 my-1 codBorder">
                </div>
            </form>
        </div>
        <div class="bg-light btnOrdes px-2 "><a href=""><img src="{{ asset('img/QRImg.svg') }}" alt="QR-Img"></a>
        </div>
    </div>

    <div class="text-white py-2 text-center">ORDERS
        <div class="bg-light chartProviderOrder centerSpace my-3" id="ordersProvider">

        </div>
    </div>

@endsection
