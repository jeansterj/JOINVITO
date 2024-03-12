@extends('layouts.main')

@section('content')
    <div class="container">
        <h3>MENU</h3>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-type="restaurant" aria-current="page" href="#">RESTAURANTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-type="favorites" href="#">FAVORITES</a>
            </li>
        </ul>
        <div class="card" id="restaurants">
            <div class="card-body">
                <div id="carouselRestaurants" class="carousel slide">
                    <div class="carousel-inner">
                        @php $active = "active" @endphp
                        @foreach ($cercanosMenus as $dato)
                            @foreach ($dato->usuario->proveedores as $proveedor)
                                @php $nombre = $proveedor->nombre_negocio @endphp
                                @foreach ($proveedor->menus as $menu)
                                    <div class="carousel-item {{ $active }}">
                                        <form action="{{ action([App\Http\Controllers\PedidoController::class, 'store']) }}"
                                            method="POST">
                                            @csrf
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><span>{{ $nombre }}</span></h5>
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
                                                    <button type="button" class="btn btn-primary">GET</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @php $active = "" @endphp
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRestaurants"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRestaurants"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card" id="favorites">
            <div class="card-body">
                <div id="carouselFavorites" class="carousel slide">
                    <div class="carousel-inner">
                        @php $active = "active" @endphp
                        @foreach ($favoritosMenus as $dato)
                            {{-- @foreach ($favoritosMenus as $dato) --}}
                            @php $nombre = $dato->proveedor->nombre_negocio @endphp
                            @foreach ($dato->proveedor->menus as $menu)
                                <div class="carousel-item {{ $active }}">
                                    <form action="{{ action([App\Http\Controllers\PedidoController::class, 'store']) }}"
                                        method="POST">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><span>{{ $nombre }}</span></h5>
                                                <input type="hidden" name="id_menu" value="{{ $menu->id_menu }}"></input>
                                                <p class="card-text">{{ $menu->bebida }}</p>
                                                <input type="hidden" name="bebida" value="{{ $menu->bebida }}"></input>
                                                <p class="card-text">{{ $menu->plato1 }}</p>
                                                <input type="hidden" name="plato1" value="{{ $menu->plato1 }}"></input>
                                                <p class="card-text">{{ $menu->plato2 }}</p>
                                                <input type="hidden" name="plato2" value="{{ $menu->plato2 }}"></input>
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
                                                <button type="submnit" class="btn btn-primary">GET</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @php $active = "" @endphp
                            @endforeach
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselFavorites"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselFavorites"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('map')
    <div class="container">
        <div id="map"></div>
    </div>
@endsection

@section('footer')
    <div class="container">

    </div>
@endsection
