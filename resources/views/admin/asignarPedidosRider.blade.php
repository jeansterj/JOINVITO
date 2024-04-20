@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="container adminHome addPedido">
            <div class="row margin-top">
                <h2>ASIGNACIÓN DE PEDIDO A UN RIDER</h2>
            </div>
            <div class="row">
                <div class="col">
                    <h3>SELECT MENU</h3>
                    <div class="container bg-body-primary">
                        <input type="text" class="form-control" id="searchInputProvider" placeholder="Buscar...">
                        <table id="dataTableProvider">
                            <thead>
                            <tr>
                                <th>PROVEEDOR</th>
                                <th>MENU</th>
                                <th>PACKS</th>
                            </tr>
                            </thead>
                            <tbody id="dataBodyProvider">
                                @foreach ($providers as $provider)
                                    @foreach ($provider->menus as $menu)
                                        <tr data-idprovider="{{ $provider->id_prov }}" data-idmenu="{{ $menu->id_menu }}" data-nameMenu="{{ $menu->nombre_menu }}" data-cantidad="{{ $menu->cantidad_packs }}">
                                            <td>{{ $provider->nombre }}</td>
                                            <td class="nombre">{{ $menu->nombre_menu }}</td>
                                            <td class="cantidad">{{ $menu->cantidad_packs }}</td>
                                            </div>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col">
                    <h3>SELECT RIDER</h3>
                    <input type="text" class="form-control" id="searchInputRider" placeholder="Buscar...">
                        <table id="dataTableRider">
                            <thead>
                            <tr>
                                <th>NOMBRE</th>
                            </tr>
                            </thead>
                            <tbody id="dataBodyRider">
                                @foreach ($riders as $rider)
                                    <tr data-idrider="{{ $rider->id_rider }}" data-nameRider="{{ $rider->nombre }}">
                                        <td>{{ $rider->nombre }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <div class="col">
                    <h3>ADD PEDIDO</h3>
                    <form action="{{ action([App\Http\Controllers\PedidoController::class, 'store']) }}" method="POST">
                    @csrf
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="idmenu" name="id_menu" value=""></input>
                                <input type="hidden" id="idrider" name="id_rider" value=""></input>
                                <input type="hidden" id="idprovider" name="id_provider" value=""></input>
                                <input type="hidden" name="isadmin" value="true"></input>
                                <input type="hidden" name="quantity" value=""></input>
                                <p class="card-text">Selected menu: <strong id="menu"></strong></p>
                                <p class="card-text">Selected rider: <strong id="rider"></strong></p>
                                <div class="container text-center">
                                    <div class="row align-items-start">
                                        <div class="col simbol decrement">
                                            <span>-</span>
                                        </div>
                                        <div class="col">
                                            <span class="quantity">0</span>
                                            <input type="hidden" id="cantidad" name="cantidad"
                                                value=""></input>
                                            <input type="hidden" id="total" value=""></input>
                                        </div>
                                        <div class="col simbol increment">
                                            <span>+</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="pedir">ADD</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
