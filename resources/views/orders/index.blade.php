@extends('layouts.app')
@section('pagename','Orders')
@section('content')
<section>
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
          @foreach($datas as $data)
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
