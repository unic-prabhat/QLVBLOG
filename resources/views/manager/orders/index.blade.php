@extends('manager.layouts.app')
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
        </thead>
        <tbody id="myTable">
          @foreach(App\Models\Cart::groupBy('purchase_code')->selectRaw('count(*) as total, purchase_code')->get() as $data)
          <tr @if($data->purchase_code==NULL) hidden @endif>
            <td>{{$data->purchase_code}}</td>
            <td>
              @php($sts=App\Models\Cart::where('purchase_code',$data->purchase_code)->first()->status)
              @if($sts=='pending')
              <span class="text-danger">Pending...</span>
              @endif
            </td>
            <td>£{{App\Models\Cart::where('purchase_code',$data->purchase_code)->sum('total_price')}} ({{$data->total}} items)</td>
            <td>{{App\Models\Cart::where('purchase_code',$data->purchase_code)->first()->created_at}}</td>
            <td> <a href="{{URL::to('/manager/order/'.$data->purchase_code)}}" class="btn btn-primary btn-sm">View</a> </td>
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
