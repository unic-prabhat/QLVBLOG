@extends('layouts.app')
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
       &nbsp;

       <a href="{{URL::to('product/remove/'.$data->unqid)}}" onclick="return confirm('Are you sure want to remove?')" class="btn btn-danger float-right ml-2">Delete</a>
       <a href="{{URL::to('/product/'.$data->id.'/edit')}}" class="btn btn-primary float-right">Edit</a>
     </div>
      <div class="col-md-6 mt-3">
         <h3><b>{{$data->name}}</b></h4>
         <h4 class="mt-4"><b>SKU:</b> {{$data->sku}}</h4>
         <h4 class="mt-4"><b>ID:</b> {{$data->unqid}}</h4>
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
         @if($data->type === 'Virtual')
         @else
         @foreach(App\Models\Attributes::all() as $pc)
         <?php
            $pn=strtolower($pc->name);
            ?>
         @if($data->$pn !== null)
         <h4 class="mt-4"><b>{{$pc->name}}:</b> {{$data->$pn}}</h4>
         @endif
         @endforeach
         @endif

         <h4 class="mt-4"><b>Details:</b></h4>
         <p>{{$data->description}}</p>


      </div>
      <div class="col-md-6 mt-3">
         <div class="row no-gutters">
            @foreach(App\Models\ProductImage::where('uniqid',$data->unqid)->get() as $img)
            <div class="col-md-6">
               <img src="{{URL::to($img->imagepath)}}" alt="" class="w-100">
            </div>
            @endforeach
         </div>
      </div>

      @if($data->type === 'Virtual')
      <div class="col-md-12 mt-5">
         <div class="card card-topline-aqua">
           <div class="card-body ">
              <div class="table-scrollable">

                <h3><b>Virtual Product</b></h3>
                <br>
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Attributes</th>
                      <th>Stock</th>
                      <th>Price</th>
                      <th>Sellprice</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(App\Models\ProductConfig::where('unqid',$data->unqid)->get() as $li)
                    <tr>
                      <td>{{$data->name}}</td>
                      <td>{{$li->name}}</td>
                      <td>{{$li->stock}}</td>
                      <td>£ {{$li->price}}</td>
                      <td>£ {{$li->sellprice}}</td>
                    @endforeach
                  </tbody>
                </table>


              </div>
           </div>


            <!-- <div class="card-body ">
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
                       <th>Name</th>
                       @foreach($columns as $ro)
                       <th scope="col" style="text-transform: capitalize"
                       @if($ro=='id') hidden @endif
                       @if($ro=='unqid') hidden @endif
                       @if($ro=='created_at') hidden @endif
                       @if($ro=='updated_at') hidden @endif

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
                       <th>Price</th>


                     </tr>
                   </thead>
                   <tbody>
                     @foreach(App\Models\ProductConfig::where('unqid',$data->unqid)->get() as $li)
                     <tr>
                       <td>{{$data->name}}</td>

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
                       <td>₹ {{$li->price}}</td>

                     @endforeach
                   </tbody>
                 </table>


               </div>
            </div> -->
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
                       <!-- <th>Name</th> -->
                       @foreach($columns as $ro)
                       <th scope="col" style="text-transform: capitalize"
                       @if($ro=='id') hidden @endif
                       @if($ro=='unqid') hidden @endif
                       @if($ro=='created_at') hidden @endif
                       @if($ro=='updated_at') hidden @endif

                       @if($ro=='price') hidden @endif
                       @if($ro=='stock') hidden @endif
                       <?php
                         $tmpvar = App\Models\Product::find($data->id);
                         if($tmpvar->$ro == null){ ?> hidden <?php } else {}
                       ?>
                       >{{$ro}}</th>
                       @endforeach
                       <th>Stock</th>
                       <th>Price</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>{{$data->name}}</td>

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

                   </tbody>
                 </table>


               </div>
            </div>
         </div>
      </div>
      @endif
   </div>
</section>
@endsection
@section('js')
@endsection
