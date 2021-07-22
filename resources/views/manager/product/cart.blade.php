@extends('manager.layouts.app')
@section('pagename','My Cart')
@section('content')
<section>
  <table class="table mt-2" id="countit">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Type</th>
        <th scope="col">Name</th>
        <th scope="col">SKU</th>
        <th scope="col">Price</th>
        <th scope="col" style="width: 50px;">Quantity</th>
        <th scope="col">Total</th>
        <th style="width:188px"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <form class="" action="{{URL::to('/manager/cart')}}" method="post">
          @csrf
          <input type="text" name="id" value="{{$data->id}}" hidden>
          <td>{{$data->type}}</td>
          <td>{{$data->product_name}}</td>
          <td>{{$data->sku}}</td>
          <td>£ {{$data->price}}</td>
          <td><input type="number" value="{{$data->qty}}" class="form-control" name="qty" min="1"></td>
          <td class="combat">{{$data->price*$data->qty}}</td>
          <th> <input type="submit" class="btn btn-sm btn-primary" value="Update">  <a href="{{URL::to('/manager/cart/delete/'.$data->id)}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-sm btn-danger">Delete</a> </th>
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>



  <div class="row">
    <div class="col-md-12">
      <h4 class="float-right mr-5">Total {{$datas->count()}} Items</h4>
    </div>
    <div class="col-md-12">
      <?php
      $totalasas=0;
      foreach ($datas as $dta) {
          $temp=$dta->price*$dta->qty;
          $totalasas=$totalasas+$temp;
      }
     ?>
      <h2 class="float-right mr-5">Total £{{$totalasas}}</h2>
    </div>
    <div class="col-md-12">
      <a href="{{URL::to('/manager/checkout')}}" class="btn btn-primary btn-lg float-right mr-2">Proceed to checkout</a>
    </div>
  </div>
</section>
@endsection
