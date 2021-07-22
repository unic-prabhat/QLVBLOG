@extends('layouts.app')
@section('pagename','Store')
@section('content')
<section>
  <div class="row">
    <div class="col-md-12 mt-2">
      <a href="{{URL::to('/store/create')}}" class="float-right btn btn-primary">Create</a>
    </div>


    <div class="col-md-12 mt-3">
      <table class="table table-striped js-dynamitable">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col"></th>
          </tr>
          <tr>
            <th>
               <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="Name">
            </th>
            <th>
               <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="Country">
            </th>
            <th>
               <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="City">
            </th>
            <th>
               <input  class="js-filter cusdrop form-control" type="text" value="" placeholder="State">
            </th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach(App\Models\StoreHouse::all()->sortByDesc('id') as $data)
          <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->country}}</td>
            <td>{{$data->city}}</td>
            <td>{{$data->state}}</td>
            <td> <a href="{{URL::to('/store/'.$data->id)}}" class="btn btn-primary btn-sm">View</a> </td>
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
