@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="container adminHome">
            <div class="row margin-top">
                <h2>ASIGNACIÓN DE PEDIDO A UN RIDER</h2>
            </div>
            <div class="row">
                <div class="col">
                    <h3>SELECT MENU</h3>
                    <div class="containe bg-body-tertiary">
                        <div class="accordion" id="accordionExample">
                            @foreach ($providers as $provider)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $provider->id_prov }}" aria-expanded="false" aria-controls="collapseOne">
                                        {{ $provider->nombre }}
                                    </button>
                                    </h2>
                                        <div id="collapse{{ $provider->id_prov }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            @foreach ($provider->menus as $menu)
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <strong>{{ $menu->nombre_menu }}</strong>
                                                        </div>
                                                        <div class="col-8">
                                                            <strong>{{ $menu->cantidad_packs }}</strong><span> packs disponibles</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col">
                    <h3>SELECT RIDER</h3>
                    @foreach ($riders as $rider)
                        <div class="container bg-body-tertiary rider">
                            {{ $rider->nombre }}
                        </div>
                    @endforeach

                </div>
                <div class="col">
                    <h3>ADD PEDIDO</h3>
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="idmenu" value="{{ $menu->id_menu }}"></input>
                            <p class="card-text">{{ $menu->bebida }}</p>
                            <p class="card-text">{{ $menu->plato1 }}</p>
                            <p class="card-text">{{ $menu->plato2 }}</p>
                            <div class="container text-center">
                                <div class="row align-items-start">
                                    <div class="col simbol decrement">
                                        <span>-</span>
                                    </div>
                                    <div class="col">
                                        <span class="quantity">0</span>
                                        <input type="hidden" id="cantidad" name="cantidad"
                                            value=""></input>
                                        <input type="hidden" id="total"
                                            value="{{ $menu->cantidad_packs }}"></input>
                                    </div>
                                    <div class="col simbol increment">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
