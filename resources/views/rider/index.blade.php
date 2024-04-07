@extends('layouts.main')


@section('content')
    <div class="container rider-home">
        <div class="row margin-top">
            <h2>RIDER PROFILE</h2>
        </div>
        <img src="{{ asset('img/riderIcono.svg') }}" alt="">
        <div class="row">
            <div class="col">
                <h3>RIDER INFO</h3>
                <a href="{{ action([App\Http\Controllers\RiderController::class, 'edit'], ['rider' => $rider->id_rider]) }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>

            </div>
            <div class="col">
                <h3>RIDER STATS</h3>
                <a href="{{ url('statsRider') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>HOW TO USE?</h3>
                <a href="{{ url('instructions') }}"><img src="{{ asset('img/useImg.svg') }}" alt=""></a>

            </div>
            <div class="col">
                <h3>ORDER</h3>
                <a href="{{ url('ordersRider') }}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
    <p style="color: white; font-size: 40px;">                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis pariatur reiciendis nemo eos, dolorem porro optio iusto distinctio debitis magnam enim nisi ut corrupti, maiores, quidem corporis sit quos earum!
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae sit et at ipsum commodi quis exercitationem harum architecto omnis accusamus porro ipsa corporis quo repellat quas, quod ad, maxime quasi.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum iure quae necessitatibus animi tenetur voluptates cupiditate. Necessitatibus deleniti vel laboriosam at ratione, consectetur perferendis iste voluptatem soluta tempore quasi! Animi.
</p>
@endsection
