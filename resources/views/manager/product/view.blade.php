@extends('manager.layouts.app')
@section('pagename','Products View')
@section('css')
<link rel="stylesheet" href="https://www.jqueryscript.net/demo/Simple-Responsive-jQuery-Image-Viewer-Plugin-Smooth-Products/css/smoothproducts.css">
<style media="screen">
b, strong {
    font-weight: 500;
}
</style>
@endsection
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
     <div class="col-md-12 mt-3">
       <h3><b>{{$data->name}}</b></h4>
      <h4 class="mt-4" style="margin-top:-5px !important"><b>SKU:</b> {{$data->sku}}</h4>

     </div>
     <div class="col-md-6 mt-3">
        <div class="row no-gutters">

            <div class="col-md-12 pb-2">
              <img src="{{URL::to(App\Models\ProductImage::where('uniqid',$data->unqid)->first()->imagepath)}}" alt="" class="w-100">
            </div>
            @foreach(App\Models\ProductImage::where('uniqid',$data->unqid)->get() as $img)
            <div class="col-md-3 p-2">
               <img src="{{URL::to($img->imagepath)}}" alt="" class="w-100">
            </div>
            @endforeach



        </div>
     </div>
      <div class="col-md-6 mt-3">

         <!-- <h4 class="mt-4"><b>ID:</b> {{$data->unqid}}</h4> -->

         <h4 class="mt-4"><b>Category:</b>
           @foreach($data->category as $c)
             @foreach(App\Models\ProductCategory::all() as $cat)
             <span @if($c == $cat->name) @else hidden @endif>{{$cat->name}}, </span>
               @foreach(App\Models\ProductSubCategory::where('parent_name',$cat->name)->get() as $subcat)
               <span @if($c == $subcat->name) @else hidden @endif>{{$subcat->name}}, </span>
               @endforeach
             @endforeach
           @endforeach
         </h4>
         <!-- @if($data->type === 'Virtual')
         @else
         @foreach(App\Models\Attributes::all() as $pc)
         <?php
            $pn=strtolower($pc->name);
            ?>
         @if($data->$pn !== null)
         <h4 class="mt-4"><b>{{$pc->name}}:</b> {{$data->$pn}}</h4>
         @endif
         @endforeach
         @endif -->

         <h4 class="mt-4"><b>Details:</b></h4>
         <p>{{$data->description}}</p>


         <div class="row">
           @if($data->type === 'Virtual')
           <div class="col-md-12 mt-5">
              <div class="card card-topline-aqua">

                 <div class="card-body ">
                    <div class="table-scrollable">
                      <h3><b>Virtual Product</b></h3>
                      <br>
                      <table class="table table-sm"
                      @if(App\Models\ProductConfig::where('unqid',$data->unqid)->exists())

                      @else
                      hidden
                      @endif

                      >


                        <thead>
                          <?php
                          $user= new App\Models\ProductConfig;
                          $table = $user->getTable();
                          $columns  = \Schema::getColumnListing($table);
                          ?>
                          <tr>
                            <th>Variation</th>
                            @foreach($columns as $ro)
                            <th scope="col" style="text-transform: capitalize"
                            @if($ro=='id') hidden @endif
                            @if($ro=='unqid') hidden @endif
                            @if($ro=='created_at') hidden @endif
                            @if($ro=='updated_at') hidden @endif
                            @if($ro=='name') hidden @endif


                            @if($ro=='price') hidden @endif
                            @if($ro=='stock') hidden @endif
                            <?php
                              if(App\Models\ProductConfig::where('unqid',$data->unqid)->first()){
                                  $chk=App\Models\ProductConfig::where('unqid',$data->unqid)->first();
                                  ?>
                                  @if($chk->$ro==null) hidden @endif
                                  <?php
                              }else{}
                            ?>


                            >{{$ro}}</th>
                            @endforeach
                            <th>Stock</th>
                            <th style="    width: 65px;">Price</th>
                            <th></th>


                          </tr>
                        </thead>
                        <tbody>
                          @foreach(App\Models\ProductConfig::where('unqid',$data->unqid)->get() as $li)
                          <tr>

                            @foreach($columns as $ro)

                            <td

                              @if($li->$ro != null) @else hidden @endif

                              @if($ro=='id') hidden @endif
                              @if($ro=='unqid') hidden @endif
                              @if($ro=='created_at') hidden @endif
                              @if($ro=='updated_at') hidden @endif
                              @if($ro=='price') hidden @endif
                              @if($ro=='stock') hidden @endif
                              >
                              {{$li->$ro}}
                            </td>

                            @endforeach
                            <td>{{$li->stock}}</td>
                            <td>£ {{$li->price}}</td>

                            <td> <form class="" action="{{URL::to('/manager/addtocart')}}" method="post">
                              @csrf
                              <input type="text" value="{{auth()->user()->id}}" name="auth_id" hidden>
                              <input type="text" value="{{auth()->user()->name}}" name="auth_name" hidden>
                              <input type="text" value="{{$data->type}}" name="type" hidden>
                              <!-- <input type="text" value="Pending" name="status" hidden> -->
                              <!-- <input type="text" value="Pending" name="status" hidden> -->

                              <input type="text" value="{{$data->sku}}" name="sku" hidden>


                              <input type="text" name="product_id" value="{{$data->id}}" hidden>
                              <input type="text" name="product_name" value="{{$data->name}} {{$li->name}}" hidden>



                              <?php
                              $user= new App\Models\ProductConfig;
                              $table = $user->getTable();
                              $columns  = \Schema::getColumnListing($table);
                              ?>
                              @foreach($columns as $cols)
                              <input type="text" name="{{$cols}}" value="{{$li->$cols}}"
                              @if($cols=='id') disabled hidden @endif
                              @if($cols=='created_at') disabled hidden @endif
                              @if($cols=='updated_at') disabled hidden @endif
                              @if($cols=='stock') disabled hidden @endif
                              hidden>

                              @if($cols=='id')
                              <input type="text" name="product_virtual_id" value="{{$li->id}}" hidden>
                              @endif
                              @endforeach

                              <input type="number"class="form-control" name="qty" value="0" min="1" max="{{$li->stock}}" style="display: inline-table;width: 30%;" required>
                              <!-- <input type="submit" class="btn btn-primary btn-sm" name="" value="Add to cart"> -->
                              <button type="submit"  class="btn btn-primary btn-sm" style="    font-size: 14px;
                                border-radius: 4px;
                                margin-top: -2px;
                                margin-left: 8px;"

                                @if($li->price == NULL) disabled @endif
                                @if($li->price == 0) disabled @endif
                                @if($li->stock == NULL) disabled @endif
                                @if($li->stock == 0) disabled @endif
                                @if($li->sellprice == NULL) disabled @endif
                                @if($li->sellprice == 0) disabled @endif


                                > <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                            </form> </td>

                          @endforeach
                        </tbody>
                      </table>


                    </div>
                 </div>
              </div>
           </div>



           @else




           <div class="col-md-12 mt-5">
              <div class="card card-topline-aqua">

                 <div class="card-body ">
                    <div class="table-scrollable">

                      <h3><b>Simple Product</b></h3>
                      <br>
                      <table class="table table-sm">


                        <thead>
                          <?php
                          $user= new App\Models\ProductConfig;
                          $table = $user->getTable();
                          $columns  = \Schema::getColumnListing($table);
                          ?>
                          <tr>
                            @foreach($columns as $ro)
                            <th scope="col" style="text-transform: capitalize"
                            @if($ro=='id') hidden @endif
                            @if($ro=='unqid') hidden @endif
                            @if($ro=='created_at') hidden @endif
                            @if($ro=='updated_at') hidden @endif
                            @if($ro=='name') hidden @endif


                            @if($ro=='price') hidden @endif
                            @if($ro=='stock') hidden @endif
                            <?php
                              $tmpvar = App\Models\Product::find($data->id);
                              if($tmpvar->$ro == null){ ?> hidden <?php } else {}
                            ?>
                            >{{$ro}}</th>
                            @endforeach
                            <th>Stock</th>
                            <th style="width: 65px;">Price</th>
                            <th style="width: 165px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            @foreach(App\Models\Attributes::orderBy('id','asc')->get() as $pc)
                            <?php
                               $pn=strtolower($pc->name);
                               ?>
                            @if($data->$pn !== null)
                            <td>{{$data->$pn}}</td>
                            @endif
                            @endforeach

                            <td>{{$data->stock}}</td>
                            <td>£ {{$data->price}}</td>


                            <td> <form class="" action="{{URL::to('/manager/addtocart')}}" method="post">
                              @csrf
                              <input type="text" value="{{auth()->user()->id}}" name="auth_id" hidden>
                              <input type="text" value="{{auth()->user()->name}}" name="auth_name" hidden>
                              <input type="text" value="{{$data->type}}" name="type" hidden>
                              <!-- <input type="text" value="Pending" name="status" hidden> -->
                              <!-- <input type="text" value="Pending" name="payment" hidden> -->

                              <input type="text" value="{{$data->sku}}" name="sku" hidden>


                              <input type="text" name="product_id" value="{{$data->id}}" hidden>
                              <input type="text" name="product_name" value="{{$data->name}}" hidden>

                              <?php
                              $user= new App\Models\ProductConfig;
                              $table = $user->getTable();
                              $columns  = \Schema::getColumnListing($table);
                              ?>
                              @foreach($columns as $cols)
                              <input type="text" name="{{$cols}}" value="{{$data->$cols}}"
                              @if($cols=='id') disabled hidden @endif
                              @if($cols=='created_at') disabled hidden @endif
                              @if($cols=='updated_at') disabled hidden @endif
                              @if($cols=='stock') disabled hidden @endif
                              hidden
                              >
                              @endforeach

                              <input type="number"class="form-control" name="qty" value="1" min="1" max="{{$data->stock}}" style="display: inline-table;width: 45%;" required>
                              <!-- <input type="submit" class="btn btn-primary btn-sm" name="" value="Add to cart"> -->
                              <button type="submit"  class="btn btn-primary btn-sm" style="    font-size: 14px;
    border-radius: 4px;
    margin-top: -2px;
    margin-left: 8px;"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                            </form> </td>

                        </tbody>
                      </table>


                    </div>
                 </div>
              </div>
           </div>
           @endif
         </div>




      </div>


   </div>
</section>
@endsection
@section('js')
@endsection
