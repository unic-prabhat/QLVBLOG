@extends('layouts.app')
@section('pagename','Create product')
@section('css')
<style media="screen">
.card-box {
  background: #eaeef3;
  margin: -19px;
}
</style>
@endsection
@section('content')
<section>
  <form action="{{URL::to('/product')}}" method="post" enctype="multipart/form-data">
    @csrf

   <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
            <h3>General Information</h3>
           </div>
           <div class="card-body">
             <input type="text" name="unqid" value="{{'BS'.time().rand(111,999)}}" hidden>
             <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="" required>
             </div>
             <div class="form-group">
                <label>SKU</label>
                <input type="text" class="form-control" name="sku" placeholder="" required>
             </div>
             <label for="">Categories</label>
             @foreach(App\Models\ProductCategory::all() as $pc)
             <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" name="category[]" value="{{$pc->name}}" class="form-check-input" id="pcat{{$pc->id}}" onchange="return showSubCat{{$pc->id}}({{$pc->id}});" value="{{$pc->name}}">
                {{$pc->name}}
                </label>
             </div>
             <div id="psubcat{{$pc->id}}" style="display:none">
                @foreach(App\Models\ProductSubCategory::where('parent_name',$pc->name)->get() as $psc)
                <div class="form-check ml-5">
                   <label class="form-check-label">
                   <input type="checkbox" class="form-check-input" name="category[]" value="{{$psc->name}}">
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
                <textarea class="form-control" rows="5" name="description" required></textarea>
             </div>
             <div class="form-group">
                <label>Product Image</label>
                <input type="file" class="form-control" name="filename[]" multiple>
             </div>
             <label for="">Product Type</label>
             <br>
             <div class="form-check-inline">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="type" value="Simple" onchange="return productType('Simple');">Simple
                </label>
             </div>
             <div class="form-check-inline">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="type" value="Virtual" onchange="return productType('Virtual');">Virtual
                </label>
             </div>
             <script type="text/javascript">
                function productType(type){
                  if(type == 'Simple'){
                    $('#simpleproductdiv').show();
                    $("#price").prop('disabled', false);
                    $("#stock").prop('disabled', false);
                    $('#virtualproductdiv').hide();
                  }else{
                    $('#simpleproductdiv').hide();
                    $("#price").prop('disabled', true);
                    $("#stock").prop('disabled', true);
                    $('#virtualproductdiv').show();
                  }
                }
             </script>

           </div>
         </div>
       </div>


       <!-- <div class="col-md-12" id="simpleproductdiv" style="display:none">
         <div class="card">
           <div class="card-header">
              ss
           </div>
           <div class="card-body">
             ss
           </div>
         </div>
       </div> -->

       <div class="col-md-12" id="simpleproductdiv" style="display:none">
         <div class="card">
           <div class="card-header">
              <h3>Simple Product</h3>
           </div>
           <div class="card-body">
             <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label>Price</label>
                      <input type="number" step="any" class="form-control" name="price" id="price" required>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label>Stock</label>
                      <input type="number" class="form-control" name="stock" id="stock" required>
                   </div>
                </div>
                @foreach(App\Models\Attributes::all() as $atb)
                <div class="col-md-4">
                   <div class="form-group">
                      <label>{{$atb->name}}</label>
                      <select class="form-control" name="{{strtolower($atb->name)}}">
                         <option value="">Select {{$atb->name}}</option>
                         @foreach(App\Models\SubAttributes::where('parent_name',strtolower($atb->name))->get() as $pw)
                         <option>{{$pw->name}}</option>
                         @endforeach
                      </select>
                   </div>
                </div>
                @endforeach
             </div>
           </div>
         </div>
       </div>


       <div class="col-md-12" id="virtualproductdiv" style="display:none">
         <div class="card">
           <div class="card-header">
              <h3>Virtual Product</h3>
           </div>
           <div class="card-body">
             <div class="row">
               <div class="col-md-3">
                 <div class="card">
                   <div class="card-body">
                     @foreach(App\Models\Attributes::all() as $data)
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="{{$data->name}}parent" name="{{$data->name}}parent" value="{{$data->name}}" >{{$data->name}}
                        </label>
                     </div>
                       @foreach(App\Models\SubAttributes::where('parent_name',$data->name)->get() as $dta)
                       <div class="form-check ml-4">
                          <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="{{$data->name}}" value="{{$dta->name}}">{{$dta->name}}
                          </label>
                       </div>
                       @endforeach
                     @endforeach
                   </div>
                 </div>
                 <button type="button" name="button" class="btn btn-primary btn-block mt-4" onclick="generate2()" id="generatebtn">Generate</button>
                 <button type="button" name="button" class="btn btn-danger btn-block mt-4" onclick="window.location.reload()" id="clearbtn" style="display:none">Clear</button>
               </div>
               <div class="col-md-9">
                 <div id='showtxt' class="form-row"></div>
               </div>
             </div>
           </div>
         </div>
       </div>



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
                         console.log(item)
                         document.getElementById("showtxt").innerHTML +='<input type="text" value="'+item+'" name="virtual_name[]" class="form-control" style="width: 25%;margin: 8px 4px;"/><input type="number" step="any" placeholder="Price" name="virtual_price[]"  class="form-control" style="width: 24%;margin: 8px 4px;"/><input type="number" placeholder="Selling Price" name="virtual_sellprice[]" class="form-control" style="width: 24%;margin: 8px 4px;"/><input type="number" placeholder="Quantity" name="virtual_qty[]" class="form-control" style="width: 22%;margin: 8px 4px;"/><br>';
                       }

                   }
                 })
               }

            </script>

            <input type="submit" class="btn btn-primary float-right" value="Add">
         <br><br>
      </div>
   </div>
 </form>

</section>
@endsection
