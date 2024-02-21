@extends('layouts.main')

@section('title')
    Register Supplier - JoInvito
@endsection

@section('navbar')


@endsection

@section('content')
    <h1>REGISTER</h1>
    <h2>CHOOSE USER TYPE</h2>
    <div class="forms">
        <div class="rider formSelectorIcon">
            <img src="../public/img/rider_icon.png" alt="rider_icon.png" width="132px">
            <figcaption>RIDER</figcaption>
        </div>
        <div class="supplier formSelectorIcon">
            <img src="../public/img/supplier_icon.png" alt="rider_icon.png" width="111px">
            <figcaption>SUPPLIER</figcaption>
        </div>
    </div>
    <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-light">Submit</button>
    </form>
@endsection