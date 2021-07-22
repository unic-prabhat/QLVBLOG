@php
$pagename='Country'
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
                                    <form action="{{URL::to('/country')}}" method="post">
                                      @csrf
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
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                           <th>No</th>
                                                            <th>{{$pagename}}</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach(App\Models\Country::all() as $key=>$data)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$data->name}}</td>
                                                            <td>
                                                              <!-- <a href="{{URL::to('/productcategory/'.$data->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                                                              &nbsp;&nbsp; -->
                                                              <a href="{{URL::to('/country/'.$data->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a>

                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
    </div>
  </div>
</section>
@endsection
