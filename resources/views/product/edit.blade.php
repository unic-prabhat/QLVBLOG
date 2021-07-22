@extends('layouts.app')
@section('pagename','Edit Product')
@section('css')
<style media="screen">
.card-box {
  background: #eaeef3;
  margin: -19px;
}
.rssyn{
  position: absolute;
margin-top: 4px;
margin-left: 2px;
}
</style>
@endsection
@section('content')
<section>
  <form action="{{URL::to('/product/'.$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
            <h3>General Information</h3>
           </div>
           <div class="card-body">
             <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
             </div>
             <div class="form-group">
                <label>SKU</label>
                <input type="text" class="form-control" name="sku" value="{{$data->sku}}" required>
             </div>


             <label for="">Categories</label>
             @foreach(App\Models\ProductCategory::all() as $pc)
             <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="category[]" value="{{$pc->name}}" class="form-check-input" id="pcat{{$pc->id}}" onchange="return showSubCat{{$pc->id}}({{$pc->id}});" value="{{$pc->name}}"   @foreach(App\Models\Product::where('id',$data->id)->first()->category as $pr) @if($pc->name==$pr) checked @endif  @endforeach>
                {{$pc->name}}
                </label>
             </div>
             <div id="psubcat{{$pc->id}}">
                @foreach(App\Models\ProductSubCategory::where('parent_name',$pc->name)->get() as $psc)
                <div class="form-check ml-5">
                   <label class="form-check-label">
                   <input type="checkbox" class="form-check-input" name="category[]" value="{{$psc->name}}" @foreach(App\Models\Product::where('id',$data->id)->first()->category as $pr) @if($pc->name==$pr) checked @endif  @endforeach>
                   {{$psc->name}}
                   </label>
                </div>
                @endforeach
             </div>
             <script type="text/javascript">
                function showSubCat{{$pc->id}}(id){
                  var decider = document.getElementById('pcat{{$pc->id}}');
                  if(decider.checked){
                    $('#psubcat{{$pc->id}}').show();
                  } else {
                    $('#psubcat{{$pc->id}}').hide();
                  }
                  return false;
                }
             </script>
             @endforeach

             <br>
             <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" rows="5" name="description" required>{{$data->description}}</textarea>
             </div>

             <button type="submit" class="btn btn-primary float-right">Update</button>
           </form>
           </div>
         </div>
       </div>

       @if($data->type=='Simple')
       <div class="col-md-12" id="simpleproductdiv">
         <div class="card">
           <div class="card-header">
              <h3>Simple Product</h3>
           </div>
           <div class="card-body">
             <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control" name="price" value="{{$data->price}}">
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label>Stock</label>
                      <input type="number" class="form-control" name="stock" value="{{$data->stock}}">
                   </div>
                </div>
                @foreach(App\Models\Attributes::all() as $atb)
                <div class="col-md-4">
                   <div class="form-group">
                     @php($var=strtolower($atb->name))
                     @php($cusval=App\Models\Product::find($data->id)->$var)
                      <label>{{$atb->name}}</label>
                      <select class="form-control" name="{{strtolower($atb->name)}}">
                         <option value="">Select {{$atb->name}}</option>
                         @foreach(App\Models\SubAttributes::where('parent_name',strtolower($atb->name))->get() as $pw)
                         <option val="{{$pw->name}}" @if($cusval ==$pw->name) selected @endif>{{$pw->name}}</option>
                         @endforeach
                      </select>
                   </div>
                </div>
                @endforeach
             </div>
           </div>
         </div>
       </div>
       @endif

       @if($data->type=='Virtual')
       <div class="col-md-12" id="virtualproductdiv">
         <div class="card">
           <div class="card-header">
              <h3>Virtual Product</h3>
           </div>
           <div class="card-body">
             <div class="row">
               <div class="col-md-12">

                 <table class="table table-sm">
                   <thead>
                     <tr>
                       <th>Name</th>
                       <th>Attributes</th>
                       <th>Stock</th>
                       <th>Price</th>
                       <th>Sellprice</th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach(App\Models\ProductConfig::where('unqid',$data->unqid)->get() as $li)
                     <form class="" action="{{URL::to('/updatevirtualproduct/'.$li->id)}}" method="post">
                       @csrf
                       @method('PUT')
                       <tr>
                         <td>{{$data->name}}</td>
                         <td>{{$li->name}}</td>
                         <td><input type="number" class="form-control" name="stock" value="{{$li->stock}}" required></td>
                         <td><span class="rssyn">£</span><input type="number" class="form-control" name="price" value="{{$li->price}}" required></td>
                         <td><span class="rssyn">£</span><input type="number" class="form-control" name="sellprice" value="{{$li->sellprice}}" required></td>
                         <td>  <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                         </form>

                           <a href="{{URL::to('/deletevirtualproductnow/'.$li->id)}}" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger" style="position:absolute"><i class="fa fa-trash" aria-hidden="true"></i></a>

                         </td>
                       </tr>
                     @endforeach
                     <tr>
                       <form class="" action="{{URL::to('/createvirtualproductnew')}}" method="post">
                         @csrf
                         <td>
                           <input type="text" name="unqid" value="{{$data->unqid}}" hidden>
                           {{$data->name}}
                         </td>
                        <td>
                          <select name="name" class="form-control" required>
                            <option value="">Attribute</option>

                             @foreach(App\Models\SubAttributes::where('parent_name','Color')->get() as $dta)
                              @foreach(App\Models\SubAttributes::where('parent_name','Size')->get() as $dtas)
                            <option value="{{$dta->name}} - {{$dtas->name}}">{{$dta->name}} - {{$dtas->name}}</option>
                             @endforeach
                            @endforeach
                          </select>
                        </td>

                         <td><input type="number" class="form-control" name="stock" placeholder="Stock" required></td>
                         <td><span class="rssyn">£</span><input type="number" class="form-control" name="price" placeholder="Price" required></td>
                         <td><span class="rssyn">£</span><input type="number" class="form-control" name="sellprice" placeholder="SellPrice" required></td>
                         <td><button type="submit" name="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button> </td>
                       </form>
                     </tr>
                   </tbody>
                 </table>


               </div>
             </div>
           </div>
         </div>
       </div>
       @endif


      <div class="col-md-12">


            <!-- <br>

            <div class="" id="simpleproductdiv" style="display:none">

            </div>
            <div class="" id="virtualproductdiv" style="display:none">
               <br>


            </div> -->
            <script type="text/javascript">
               function generate2(){
                 $('#generatebtn').hide();
                 $('#clearbtn').show();


                 var attributes = [];
                 $.ajax({
                   type:'GET',
                   url:'{{URL::to("/attributes/list")}}',
                   success:function(data){

                     $.each(data,function(i,item){
                       // console.log(item.name)

                       var randsa =[];
                       if ($("#"+item.name+"parent").is(":checked")) {
                         // console.log(item.name+' checked');

                         $("input:checkbox[name="+item.name+"]:checked").each(function(){
                             // console.log($(this).val());
                             randsa.push($(this).val());
                         });
                         attributes.push(randsa);


                       } else {
                         // console.log(item.name+' not checked');

                       }

                       // var attributes = [];
                       // attributes.push(randsa);


                     })

                     console.log(attributes)

                     function add_variations_to_array(base, variations){
                     let ret = [];
                     for(let e of base)
                       for(let variation of variations){
                         ret.push(e+" - "+variation);
                       }
                     return ret;
                     }

                     //generate variations

                       let variations = attributes[0];
                       if(attributes.length > 1){
                       for(let i in attributes)
                         if(i>0)
                           variations = add_variations_to_array(variations, attributes[i]);
                       }

                       console.log(variations);
                       variations.forEach(myFunction);
                       function myFunction(item, index) {
                         document.getElementById("showtxt").innerHTML +='<input type="text" value="'+item+'" name="virtual_name[]" class="form-control" style="width: 25%;margin: 8px 4px;"/><input type="number" placeholder="Price" name="virtual_price[]" class="form-control" style="width: 24%;margin: 8px 4px;"/><input type="number" placeholder="Selling Price" name="virtual_sellprice[]" class="form-control" style="width: 24%;margin: 8px 4px;"/><input type="number" placeholder="Quantity" name="virtual_qty[]" class="form-control" style="width: 22%;margin: 8px 4px;"/><br>';
                       }

                   }
                 })
               }

            </script>

         <br><br>
      </div>
   </div>


</section>
@endsection
@section('js')
<script>
$(document).ready(function() {
    $('#option-droup-demo').multiselect();
});
</script>
@endsection
