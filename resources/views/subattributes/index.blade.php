@php
$pagename='Sub Attributes'
@endphp
@extends('layouts.app')
@section('pagename',$pagename)
@section('content')
<section>
  <div class="row">

    <div class="col-md-6">
      <div class="card card-box">
                                <div class="card-head">
                                    <header>Create {{$pagename}}</header>


                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form action="{{URL::to('/subattributes')}}" method="post">
                                      @csrf
                                      <div class="form-group">
                                            <label>Attribute</label>
                                            <select class="form-control" name="parent_name">
                                                @foreach(App\Models\Attributes::all() as $ab)
                                                <option>{{$ab->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{$pagename}}</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter {{$pagename}}">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
    </div>
    <div class="col-md-6">
      <div class="card card-topline-aqua">
                                        <div class="card-head">
                                            <header>{{$pagename}} List</header>
                                        </div>
                                        <div class="card-body ">
                                            <div class="table-scrollable">

                                                      @foreach(App\Models\Attributes::all() as $key=>$data)
                                                        <div class="mb-4">
                                                          <h4>{{$key+1}}. {{$data->name}}</h4>
                                                          <p>
                                                            @foreach(App\Models\SubAttributes::where('parent_name',$data->name)->get() as $chi)
                                                              {{$chi->name}}
                                                              <a href="{{URL::to('/subattributes/'.$chi->id)}}" onclick="return confirm('Are you sure?');" class="text-danger text-bold"><b><i class="fa fa-trash" aria-hidden="true"></i></b></a>
                                                              &nbsp;&nbsp;
                                                            @endforeach
                                                          </p>
                                                        </div>
                                                      @endforeach

                                            </div>
                                        </div>
                                    </div>
    </div>
  </div>
</section>
@endsection
