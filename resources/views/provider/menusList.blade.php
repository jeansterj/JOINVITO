@extends('layouts.main')


@section('content')
    <div class="bg-light chartRiderOrder centerSpace my-3">

        <div class="chartRiderOrder row container ">
            <div class="d-flex">

                <div class="col-8">
                    <h2 class="text-start">Order 1 </h2>

                </div>
                <div class="col">

                    <a href="{{ url('modifyMenu')}}"><img src="{{ asset('img/editIcon.svg') }}" alt=""></a>
                </div>
            </div>

            <div class="d-flex">
                <div class="row">
                    <div class="col-8">
                        <h3 class="text-start">CHEESE BURGUER
                            FISH, COCA-COLA</h3>
                    </div>

                    <button type="button" class="btn btnDelete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="{{ asset('img/deleteIcon.svg') }}" alt="">
                    </button>

                </div>
            </div>

        </div>



    </div>


    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary text-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-break mx-4" id="exampleModalLabel">ARE YOU SURE TO DELETE ORDER 1?</h1>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-light text-secondary btnOrdes px-5">YES</button>

                    <button type="button" class="btn btn-light text-secondary btnOrdes px-5"
                        data-bs-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
@endsection
