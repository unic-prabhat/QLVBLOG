@extends('layouts.app')
@section('pagename','Dashboard')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <a href="{{URL::to('/orders')}}">
        <div class="card" style="background-color: #bad4ff;">
          <div class="card-body">
            <center>
            <h4 class="text-dark" style="font-size: 18px !important;font-weight: 600;">Total Order</h4>
            <h5 class="text-dark" style="font-size: 32px !important;">{{App\Models\Cart::all()->count()}}</h5>
            </center>
          </div>
        </div>
      </a>

    </div>
    <div class="col-md-3">
      <a href="{{URL::to('/orders')}}">
      <div class="card" style="background-color: #bad4ff;">
        <div class="card-body">
          <center>
          <h4 class="text-dark" style="font-size: 18px !important;font-weight: 600;">Total Order Value</h4>
          <h5 class="text-dark" style="font-size: 32px !important;">£{{App\Models\Cart::where('payment','paid')->sum('total_price')}}</h5>
          </center>
        </div>
      </div>
      </a>
    </div>
    <div class="col-md-3">
      <a href="{{URL::to('/store')}}">
        <div class="card" style="background-color: #bad4ff;">
          <div class="card-body">
            <center>
            <h4 class="text-dark" style="font-size: 18px !important;font-weight: 600;">Total Stores</h4>
            <h5 class="text-dark" style="font-size: 32px !important;">{{App\Models\StoreHouse::all()->count()}}</h5>
            </center>
          </div>
        </div>
      </a>

    </div>
    <div class="col-md-3">
      <a href="{{URL::to('/product')}}">
        <div class="card" style="background-color: #bad4ff;">
          <div class="card-body">
            <center>
            <h4 class="text-dark" style="font-size: 18px !important;font-weight: 600;">Total Products</h4>
            <h5 class="text-dark" style="font-size: 32px !important;">{{App\Models\Product::all()->count()}}</h5>
            </center>
          </div>
        </div>
      </a>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3>Recent Orders</h3>


          <div class="row">
            <div class="col-md-12 mt-3">
              <table class="table table-striped js-dynamitable">
                <thead>
                  <tr>
                    <th scope="col">OrderID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col"></th>
                  </tr>
                  <!-- <tr>
                    <th>
                       <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="OrderID">
                    </th>
                    <th>
                        <select class="js-filter cusdrop form-control">
                          <option value="">All</option>
                          <option value="Active">Active</option>
                          <option value="Pending">Pending</option>
                        </select>
                      </th>
                      <th>
                          <select class="js-filter cusdrop form-control">
                            <option value="">All</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Simple">Simple</option>
                          </select>
                        </th>
                        <th>
                           <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="Name">
                        </th>
                        <th>
                           <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="SKU">
                        </th>
                        <th>
                           <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="Price">
                        </th>
                        <th>
                           <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="Qty">
                        </th>
                        <th></th>
                  </tr> -->
                </thead>
                <tbody id="myTable">
                  @php($datasx=App\Models\Cart::groupBy('purchase_code')->selectRaw('count(*) as total, purchase_code')->get())
                  @foreach($datasx as $data)
                  <tr @if($data->purchase_code==NULL) hidden @endif>
                    <td>{{$data->purchase_code}}</td>
                    <td>
                      @php($sts=App\Models\Cart::where('purchase_code',$data->purchase_code)->first()->status)
                      @if($sts=='pending')
                      <span class="text-danger">Pending</span>
                      @endif
                      @if($sts=='processing')
                      <span class="text-info">Processing</span>
                      @endif
                      @if($sts=='completed')
                      <span class="text-success">Completed</span>
                      @endif
                      @if($sts=='cancelled')
                      <span class="text-danger">Cancelled</span>
                      @endif
                    </td>
                    <td>£{{App\Models\Cart::where('purchase_code',$data->purchase_code)->sum('total_price')}} ({{$data->total}} items)</td>
                    <td>{{App\Models\Cart::where('purchase_code',$data->purchase_code)->first()->created_at}}</td>

                    <td> <a href="{{URL::to('/order/'.$data->purchase_code)}}" class="btn btn-primary btn-sm">View</a> </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>



    </div>
  </div>
</div>
@endsection
