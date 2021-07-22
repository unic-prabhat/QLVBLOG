@extends('layouts.app')
@section('pagename','Quantity Report')
@section('content')
<section>
  <div class="row">
    <div class="col-md-12">
      <form method="post" action="{{URL::to('/searchqreport')}}">
        @csrf
        <div class="form-row">
          <div class="col-md-10">
            <label for="">Enter Quantity</label>
            <input type="number" class="form-control" name="qty" required>
          </div>
          <div class="col-md">
            <input type="submit" class="btn btn-primary btn-block" value="Search" style="margin-top: 34px;">
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-12 mt-5">
      <table class="table table-striped js-dynamitable">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Qty</th>
            <th scope="col">CreatedAt</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($datas as $data)
          <tr>
            <td>{{$data->product_name}}</td>
            <td>£ {{$data->price}}</td>
            <td>{{$data->qty}}</td>
            <td>{{$data->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <br>
      <button id="exportBtn1" class="btn btn-info float-right"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXPORT REPORT</button>

    </div>
  </div>


  <table class="table table-striped js-dynamitable d-none" id="tab1">
    <thead>
      <tr>
        <th scope="col"><center>Status</center></th>
        <th scope="col"><center>Type</center></th>
        <th scope="col"><center>Name</center></th>
        <th scope="col"><center>SKU</center></th>
        <th scope="col"><center>Price</center></th>
        <th scope="col"><center>Qty</center></th>
        <th scope="col"><center>CreatedAt</center></th>
      </tr>
    </thead>
    <tbody id="myTable">
      @foreach($datas as $data)
      <tr>
        <td>{{$data->status}}</td>
        <td>{{$data->type}}</td>
        <td>{{$data->product_name}}</td>
        <td>{{$data->sku}}</td>
        <td>£ {{$data->price}}</td>
        <td>{{$data->qty}}</td>
        <td>{{$data->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>


</section>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $("#exportBtn1").click(function(){
        TableToExcel.convert(document.getElementById("tab1"), {
            name: "Transaction Report.xlsx",
            sheet: {
            name: "Sheet1"
            }
          });
        });
  });
</script>
@endsection
