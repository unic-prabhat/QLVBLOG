@extends('layouts.app')
@section('pagename','User Edit')
@section('content')


<section>
  <div class="row">
    <div class="col-md-12 mt-3">
      <form  action="{{URL::to('user/'.$data->id)}}" method="post">
        @csrf
        @method('PUT')
        <h3>Personal Info</h3>
        <div class="form-group">
          <label>User Type</label>
          <select class="form-control" name="usertype">
            <option value="Admin" @if($data->usertype=='Admin') selected @endif>Admin</option>
            <option value="Manager" @if($data->usertype=='Manager') selected @endif>Manager</option>
          </select>
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
          <label>Contact</label>
          <input type="text" class="form-control" name="contact" value="{{$data->contact}}">
        </div>

        <br><br>
        <h3>Address Information</h3>
        <div class="form-group">
          <label>Address1</label>
          <input type="text" class="form-control" name="address1" value="{{$data->address1}}">
        </div>
        <div class="form-group">
          <label>Address2 (optional)</label>
          <input type="text" class="form-control" name="address2" value="{{$data->address2}}">
        </div>
        <div class="form-group">
          <label>Postcode / Zipcode</label>
          <input type="text" class="form-control" name="zipcode" value="{{$data->zipcode}}">
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" class="form-control" name="city" value="{{$data->city}}">
        </div>
        <div class="form-group">
          <label>State</label>
          <input type="text" class="form-control" name="state" value="{{$data->state}}">
        </div>
        <div class="form-group">
          <label>Country</label>
          <input type="text" class="form-control" name="country" value="{{$data->country}}">
        </div>

        <br><br>
        <h3>Store Details</h3>
        <!-- <div class="form-group">
          <label>User Type</label>
          <select class="form-control" name="usertype">
            <option>Admin</option>
            <option>Manager</option>
          </select>
        </div> -->
        <!-- <div class="form-group">
          <select class="form-control" name="storeid">
            @foreach(App\Models\StoreHouse::where('auth_id',NULL)->get() as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
          </select>
        </div> -->
        <div class="form-group">
          <select class="form-control" name="storeid">
            @foreach(App\Models\StoreHouse::all() as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</section>
@endsection
