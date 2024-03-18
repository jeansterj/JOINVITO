@extends('layouts.main')

@section('title')
    Contact with us - JoInvito
@endsection

@section('content')
<h1 class="text-light">Contact With Us</h1>
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
    <p style="font-size: 90px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis cumque dolor ullam dicta, rerum harum neque est sapiente velit corrupti ratione tenetur aliquid reprehenderit sequi temporibus molestias ipsam quo voluptatibus!</p>
@endsection