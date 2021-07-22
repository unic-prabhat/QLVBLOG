@extends('layouts.app')
@section('pagename','Store View')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>View Store Details
          <a href="{{URL::to('/store/deletestore/'.$data->id)}}" onclick="return confirm('Are you sure want to delete this store?')" class="btn btn-danger float-right">Delete</a>
          <a href="{{URL::to('/store/'.$data->id.'/edit')}}" class="btn btn-info float-right mr-2">Edit</a>
        </h2>
      </div>
      <div class="col-md-12">
        <h5><b>Name:</b> {{$data->name}}</h5>
        <h5><b>Number:</b> {{$data->number}}</h5>
        <h5><b>Email:</b> {{$data->email}}</h5>
        <h5><b>Address1:</b> {{$data->address1}}</h5>
        <h5><b>Address2:</b> {{$data->address2}}</h5>
        <h5><b>Postal:</b> {{$data->postal}}</h5>
        <h5><b>City:</b> {{$data->city}}</h5>
        <h5><b>State:</b> {{$data->state}}</h5>
        <h5><b>Country:</b> {{$data->country}}</h5>
        <h5><b>Person Name:</b> {{$data->person_name}}</h5>
        <h5><b>Person Number:</b> {{$data->person_number}}</h5>
        <h5><b>Person Email:</b> {{$data->person_email}}</h5>



      </div>
    </div>
</div>
@endsection
