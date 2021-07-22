@extends('layouts.app')
@section('pagename','User Create')
@section('content')


<section>
  <div class="row">
    <div class="col-md-12 mt-3">
      <form  action="{{URL::to('user')}}" method="post">
        @csrf
        <h3>Personal Info</h3>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label>Email address</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
          <label>Contact</label>
          <input type="text" class="form-control" name="contact">
        </div>

        <br><br>
        <h3>Address Information</h3>
        <div class="form-group">
          <label>Address1</label>
          <input type="text" class="form-control" name="address1">
        </div>
        <div class="form-group">
          <label>Address2 (optional)</label>
          <input type="text" class="form-control" name="address2">
        </div>
        <div class="form-group">
          <label>Postcode / Zipcode</label>
          <input type="text" class="form-control" name="zipcode">
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" class="form-control" name="city">
        </div>
        <div class="form-group">
          <label>State</label>
          <input type="text" class="form-control" name="state">
        </div>
        <div class="form-group">
          <label>Country</label>
          <input type="text" class="form-control" name="country">
        </div>
        <br><br>
        <h3>Store Details</h3>
        <div class="form-group">
          <label>User Type</label>
          <select class="form-control" name="usertype">
            <option>Admin</option>
            <option>Manager</option>
          </select>
        </div>
        <div class="form-group">
          <label>Store &nbsp;&nbsp; <a href="{{URL::to('/store/create')}}" class="text-primary float-right">Add Store</a> </label>
          <select class="form-control" name="storeid">
            @foreach(App\Models\StoreHouse::all() as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</section>
@endsection
