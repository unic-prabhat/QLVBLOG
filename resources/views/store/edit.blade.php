@extends('layouts.app')
@section('pagename','Create Edit')
@section('content')



<section>
  <div class="row">
    <div class="col-md-12">
      <form action="{{URL::to('/store/'.$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <h2>Edit Store</h2>
          <div class="form-group">
              <label>Store Name</label>
              <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Store Email</label>
              <input type="text" class="form-control" name="email" value="{{$data->email}}" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Store Number</label>
              <input type="text" class="form-control" name="number" value="{{$data->number}}" placeholder="" required>
          </div>
          <br><br>
          <h2>Address Information</h2>
          <div class="form-group">
            <label>Address Line 1:</label>
            <textarea class="form-control" rows="3" name="address1" required>{{$data->address1}}</textarea>
          </div>
          <div class="form-group">
            <label>Address Line 2 (Optional):</label>
            <textarea class="form-control" rows="3" name="address2">{{$data->address2}}</textarea>
          </div>
          <div class="form-group">
              <label>Postcode / Zipcode</label>
              <input type="text" class="form-control" name="postal" value="{{$data->postal}}" placeholder="" required>
          </div>
          <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" name="city" value="{{$data->city}}" placeholder="" required>
          </div>
          <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" name="state" value="{{$data->state}}" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Country</label>
              <input type="text" class="form-control" name="country" value="{{$data->country}}" placeholder="" required>
          </div>
          <br><br>
          <h2>Contact Person Details</h2>
          <div class="form-group">
              <label>Person Name</label>
              <input type="text" class="form-control" name="person_name" value="{{$data->person_name}}" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Person Email</label>
              <input type="text" class="form-control" name="person_number" value="{{$data->person_number}}" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Person Number</label>
              <input type="text" class="form-control" name="person_email" value="{{$data->person_email}}" placeholder="" required>
          </div>

          <button type="submit" class="btn btn-primary float-right">Update</button>
      </form>
      <br><br>
    </div>
  </div>
</section>
@endsection
