@extends('layouts.app')
@section('pagename','Add Virtual Product')
@section('content')
<section>
  <div class="row">

    <div class="col-md-12">
      <form id="formsubmit" method="post" onsubmit="return formsub();">
        @csrf
        <div class="row no-gutters">
            <input type="text" name="unqid" value="{{$unqid}}" hidden>

            <div class="col-md-2 p-1">
              <input type="number" class="form-control" name="stock" value="" placeholder="Stock" required style="height: 38px;">
            </div>
            <div class="col-md-2 p-1">
              <input type="number" class="form-control" name="price" value="" placeholder="Price" required style="height: 38px;">
            </div>

            @foreach(App\Models\Attributes::orderBy('id', 'asc')->get() as $ab)
            @if(array_key_exists(strtolower($ab->name),$datas))
            <div class="col-md-2 p-1">
              <select class="form-control" name="{{strtolower($ab->name)}}" required>
                <option value="">Select {{$ab->name}}</option>
                @foreach($datas[strtolower($ab->name)] as $value)
                <option value="{{$value}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
            @else
            @endif
            @endforeach

            <div class="col-md-2 p-1">
              <input type="submit" name="" class="btn btn-primary" value="Add" style="height: 38px;">
            </div>
        </div>
      </form>
    </div>


    <div class="col-md-12 mt-5" id="showDiv">

    </div>

    <div class="col-md-12">
      <a href="{{URL::to('/totalformsubmit/'.$unqid)}}" class="btn btn-primary float-right">Submit</a>
    </div>

</section>
@endsection

@section('js')



<script type="text/javascript">
function formsub(){

  var data = $('#formsubmit').serialize();
  console.log(data)

  $.ajax({
        type: 'POST',
        url: "{{ url('/product/subattributesubmit') }}",
        data: data,
        success: function (data) {
          showTable();
        }
    });

  return false;
}

showTable();

function showTable(){
  $('#showDiv').load('{{URL::to("/showvirtualproductlist/".$unqid)}}')
}
</script>

@endsection
