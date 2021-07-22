@extends('layouts.app')
@section('pagename','Products')
@section('content')
<section>
  <div class="row">
    <div class="col-md-12 mt-2">
      <a href="{{URL::to('/product/create')}}" class="float-right btn btn-primary">Create</a>
    </div>


    <div class="col-md-12 mt-3">
      <table class="table table-striped js-dynamitable">
        <thead>
          <tr>
            <th scope="col">Status</th>
            <th scope="col">Type</th>

            <th scope="col">Name</th>
            <th scope="col">SKU</th>
            <th scope="col" style="width: 378px;">Category</th>
            <!-- <th scope="col">CreatedAt</th> -->
            <th scope="col"></th>
          </tr>
          <tr>
            <th>
              <select class="js-filter cusdrop form-control">
                <option value="">All</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
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
              <select class="js-filter cusdrop form-control">
                <option value="">All</option>

                @foreach(App\Models\ProductCategory::all() as $ab)
                <option value="{{$ab->name}}" multiple>{{$ab->name}}</option>
                  @foreach(App\Models\ProductSubCategory::where('parent_name',$ab->name)->get() as $asc)
                  <option value="{{$asc->name}}">&nbsp;&nbsp;{{$asc->name}}</option>
                  @endforeach

                @endforeach




              </select>
            </th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach(App\Models\Product::where('active_status','Active')->get()->sortByDesc('id') as $data)
          <tr>
            <td>{{$data->active_status}}</td>
            <td>{{$data->type}}</td>
            <td>{{$data->name}}</td>

            <td>{{$data->sku}}</td>
            <td>@foreach($data->category as $cat) <span class="badge badge-primary">{{$cat}}</span>  @endforeach</td>

            <!-- <td>{{$data->created_at}}</td> -->
            <td> <a href="{{URL::to('/product/'.$data->id)}}" class="btn btn-primary btn-sm">View</a> </td>

          </tr>
          @endforeach
        </tbody>
      </table>
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
