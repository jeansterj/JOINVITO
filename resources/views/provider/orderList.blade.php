@extends('layouts.main')

{{-- @section('navbar')
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="{{ asset('img/menuCorto.svg') }}" alt="">
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ABOUT US</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTACT</a>
            </li>
            <div>
                <button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}"
                        alt="">Login</button>
                <button type="button" class="btn btn-signup">Sign up</button>
            </div>
        </ul>
    </div>
@endsection --}}

@section('content')
    <div class="bg-light chartRiderOrder de my-3">

        <div class="chartRiderOrder row container ">
            <div class="d-flex">

                <div class="col-8"> 
                    <h2 class="text-start">Order 1 </h2>

                </div>
                <div class="col">
    
                    <img src="{{ asset('img/editIcon.svg')}}" alt="">
                </div>
            </div>

            <div class="d-flex">
                <div class="row">
                    <div class="col-8">
                        <h3 class="text-start">CHEESE BURGUER
                            FISH, COCA-COLA</h3>
                    </div>

                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="{{ asset('img/deleteIcon.svg')}}" alt="">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer justify-content-around">
          <button type="button" class="btn btn-light text-secondary df" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-light text-secondary df">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
