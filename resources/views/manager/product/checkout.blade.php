@extends('manager.layouts.app')
@section('pagename','Checkout')
@section('content')
<section>
<div class="row">
  <div class="col-md-7">
    <h3>Customer Information</h3>
    <form class="" action="{{URL::to('/manager/checkout/store')}}" method="post" class="mt-5">
      @csrf
      <input type="text" name="id" value="{{auth()->user()->id}}" hidden>
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="booking_name" value="{{auth()->user()->name}}" required>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="booking_email" value="{{auth()->user()->email}}" required>
      </div>
      <div class="form-group">
        <label for="">Contact</label>
        <input type="text" class="form-control" name="booking_contact" value="{{auth()->user()->contact}}" required>
      </div>
      <div class="form-group">
        <label for="">Address</label>
        <textarea class="form-control" rows="3" required name="booking_address">{{auth()->user()->address1}}</textarea>
      </div>

  </div>
  <div class="col-md-5">
    <h3>Item Information</h3>
    @foreach($datas as $data)
    <p>{{$data->product_name}} (X{{$data->qty}}) <span class="float-right"> £{{$data->price*$data->qty}} </span> </p>
    @endforeach
    <hr>
      <?php
        $totalasas=0;
          foreach ($datas as $dta) {
              $temp=$dta->price*$dta->qty;
              $totalasas=$totalasas+$temp;
          }
     ?>
    <h2 class="float-right">Total £{{$totalasas}}</h2>
    <br>
    <br>
    <input type="submit" class="btn btn-primary btn-lg float-right" value="Booknow">
    </form>
  </div>
</div>
</section>
@endsection
