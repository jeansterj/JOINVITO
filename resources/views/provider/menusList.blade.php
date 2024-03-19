@extends('layouts.main')


@section('content')
    <meta name="userId" content="{{ Auth::user()->id_usu }}">
    <div class="bg-light chartRiderOrder centerSpace my-3" id="divMenuList">
    </div>

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
