@extends('layouts.app')
@section('pagename','Select Attributes Value')
@section('content')
<section>
  <div class="row">







    <div class="col-md-12">
      <form class="" action="{{URL::to('/product/subattribute')}}" method="post">
        @csrf
        <input type="text" name="unqid" value="{{$unqid}}" hidden>

        @foreach($datas['attributes'] as $data)
        <h4>{{$data}}</h4>

          @foreach(App\Models\SubAttributes::where('parent_name',$data)->get() as $dta)

           <div class="form-check ml-5">
             <label class="form-check-label">
               <input type="checkbox" class="form-check-input" name="{{strtolower($data)}}[]" value="{{$dta->name}}">{{$dta->name}}
             </label>
           </div>
          @endforeach


        @endforeach
        <button type="submit" class="btn btn-primary float-right">Next</button>


      </form>

       <br>
    </div>
  </div>
</section>
@endsection
