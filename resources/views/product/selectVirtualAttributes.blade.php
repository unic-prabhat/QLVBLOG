@extends('layouts.app')
@section('pagename','Select Attributes')
@section('content')
<section>
  <div class="row">
    <div class="col-md-12">
      <form class="" action="{{URL::to('/product/attribute')}}" method="post">
        @csrf
        <input type="text" name="unqid" value="{{$unqid}}" hidden>
        @foreach(App\Models\Attributes::all() as $data)
        <div class="form-check ml-5">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="attributes[]" value="{{$data->name}}">{{$data->name}}
          </label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary float-right">Next</button>
      </form>
    </div>
  </div>
</section>
@endsection
