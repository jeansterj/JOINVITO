@extends('layouts.main')


@section('content')
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


    <div class="text-white py-2 text-center">ORDERS</div>

    <div class="bg-light chartRiderOrder centerSpace my-3">

        <div class="chartRiderOrder row container my-5 ">
            <div class="d-flex justify-content-center">

                <div class="text-center">
                    <h2 class="text-center">Order 1 </h2>

                </div>
            </div>

            <div class="d-flex">
                <div class="row">
                    <h3 class="text-center">CHEESE BURGUER
                        FISH, COCA-COLA</h3>

                </div>
            </div>

            <div>
                <img class="rounded mx-auto d-flex imgRiderMot" src="{{ asset('img/rider-unscreen.gif') }}" alt="riderMot">
            </div>

            <div class="btnOrdes bg-primary mx-2">.</div>

            <div>20 minuts left</div>

        </div>



    </div>


    </div>
@endsection
