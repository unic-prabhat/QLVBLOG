@extends('manager.layouts.app')
@section('pagename','Products')
@section('content')
<section>
  <div class="row">
    <div class="col-md-12">
      @php($cart=App\Models\Cart::where('auth_id',auth()->user()->id)->get()->count())

      @if($cart>0)
      <a href="{{URL::to('/manager/checkout')}}" class="btn btn-primary float-right"> <i class="fa fa-credit-card" aria-hidden="true"></i> Checkout</a>

      <a href="{{URL::to('/manager/cart')}}" class="btn btn-primary float-right mr-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> {{$cart}} Items in your cart</a>
      @endif
    </div>


    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h2><b>Categories</b></h2>
          <hr>
          <h4 class="mt-3"><b> <a href="{{URL::to('/manager/products/filter/all')}}" class="text-dark">All</a> </b></h4>
          @foreach(App\Models\ProductCategory::all() as $cat)
            <h4 class="mt-3"><b> <a href="{{URL::to('/manager/products/filter/'.$cat->name)}}" class="text-dark">{{$cat->name}}</a> </b></h4>
              @foreach(App\Models\ProductSubCategory::where('parent_name',$cat->name)->get() as $subcat)
              <h5 class="ml-4"><b><a href="{{URL::to('/manager/products/filter/'.$subcat->name)}}" class="text-dark">{{$subcat->name}}</a></b></h5>
              @endforeach
          @endforeach
        </div>
      </div>

    </div>


    <div class="col-md-9">
      <div class="card">
      <div class="card-body">
      <div class="row">
        @foreach($datas as $data)
        <div class="col-md-3 mt-3">
          <a href="{{URL::to('manager/product/'.$data->id)}}">
            <div class="col-md-12">
              <img src="{{URL::to(App\Models\ProductImage::where('uniqid',$data->unqid)->first()->imagepath)}}" class="w-100" alt="">
              <h6 class="text-dark">SKU: {{$data->sku}}</h6>
              <h4 class="text-dark">{{$data->name}}</h4>

            </div>
          </a>

        </div>
        @endforeach
      </div>
    </div>
  </div>



  </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script src="https://www.kafesta.com/js/dynamitable.jquery.min.js"></script>
@endsection
