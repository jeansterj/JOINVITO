@extends('layouts.main')

@section('content')


@section('map')
    <div class="bg-secondary chartRiderMap">

        <h2 class="text-white text-break text-center py-3 px-4">Lorem Ipsum is simply dummy text of the printing and
            typesetting industry.

            Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>

        <h1 class="text-white text-center my-4 py-3"> MAP </h1>


        <div class="container">
            <div id="map"></div>
        </div>

        <div class="py-3 d-grid">
            <a href="{{ url('addLocation') }}">
                <h1 class="buttonOrder bg-light text-primary text-center py-1 px-2"> ADD LOCATION </h1>
            </a>


        </div>

    </div>
@endsection

@endsection
