@extends('layouts.main')

@section('title')
    Contact with us - JoInvito
@endsection

@section('content')


<div class="col" id="loginDiv">
    <h1 class="text-light">Contact With Us</h1>
    <div class="container-form">
        <form class="formContact">
            <div class="form-group group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"  placeholder="Enter name...">
            </div>
            <div class="form-group group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email...">
            </div>
            <div class="form-group group">
                <label for="exampleFormControlTextarea1">What's your doubt?</label>
                <textarea class="form-control text-area" id="exampleFormControlTextarea1" rows="3" placeholder="..."></textarea>
              </div>
            <button type="submit" class="btn btn-light">Submit</button>
        </form>
    </div>
</div>
@endsection
