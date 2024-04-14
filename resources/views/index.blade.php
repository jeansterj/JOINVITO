@extends('layouts.main')
@section('title')
    Home - JoInvito
@endsection
@include('layouts.navbarLayout')

@section('esfera')
<div class="esfera1"></div>

@endsection
@section('contentHome')
<div class="landingBody">
    <h2 data-translate="WaysHelp">WAYS TO HELP</h2>
    <div class="container container-2">
        <div class="row">
          <div class="col-sm">
            <img src="../public/img/rider_icon.png" class="img" id="riderIconLanding">
            <h3 data-translate="voluntari">volunteer</h3>
            <p data-translate="riderHome" class="textHelp">The rider take the food from the suppliers and gives it to the homeless pepole.</p>
          </div>
          <div class="col-sm">
            <img src="../public/img/supplier_icon.png" alt="" class="img">
            <h3 data-translate="Supplier">Supplier</h3>
            <p data-translate="proveedorHome" class="textHelp">The supplier give food to the rider to help homeless pepole.</p>
          </div>
          <div class="col-sm">
            <img src="../public/img/sCenter_icon.png" alt="" class="img">
            <h3 data-translate="sCenter">S.Center</h3>
            <p data-translate="centerHome" class="textHelp">The social center will be able to use the rider's food to help homeless pepole who are in the social center.</p>
          </div>
        </div>
      </div>
    <div class="waysToHelp sponsorsDiv">
        <span class="navbarWaysHelp sponsors">
            <img src="../public/img/honest_greens_icon.jpg" alt="sponsor-1.png" class="sponsorsImg">
        </span>
        <span class="navbarWaysHelp sponsors">
            <img src="../public/img/sponsor-1.png" alt="sponsor-2.png" class="sponsorsImg">
        </span>
        <span class="navbarWaysHelp sponsors">
            <img src="../public/img/can_pizza.png" alt="sponsor-3.png" class="sponsorsImg">
        </span>
    </div>
    <div class="waysToHelp slogan">
        <h2 data-translate="invisible">"You are not invisible"</h2>
        <p class="sloganText" data-translate="principalCause">The principal cause for this project is to help all the homeless to have a eat all the days and the same treatment cause we all are humans, we are not better.</p>
        <p class="phrase" data-translate="frase">“Humility will open more doors than arrogance ever will”</p>
        <figcaption class="phrase">- Zig Ziglar -</figcaption>
    </div>
</div>

@endsection
