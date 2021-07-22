@extends('layouts.app')
@section('pagename','Create Store')
@section('content')



<section>
  <div class="row">
    <div class="col-md-12">
      <form action="{{URL::to('/store')}}" method="post" enctype="multipart/form-data">
        @csrf
          <h2>Store Details</h2>
          <div class="form-group">
              <label>Store Name</label>
              <input type="text" class="form-control" name="name" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Store Email</label>
              <input type="text" class="form-control" name="email" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Store Number</label>
              <input type="text" class="form-control" name="number" placeholder="" required>
          </div>
          <br><br>
          <h2>Address Information</h2>
          <div class="form-group">
            <label>Address Line 1:</label>
            <textarea class="form-control" rows="3" name="address1" required></textarea>
          </div>
          <div class="form-group">
            <label>Address Line 2 (Optional):</label>
            <textarea class="form-control" rows="3" name="address2"></textarea>
          </div>
          <div class="form-group">
              <label>Postcode / Zipcode</label>
              <input type="text" class="form-control" name="postal" placeholder="" required>
          </div>
          <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" name="city" placeholder="" required>
          </div>
          <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" name="state" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Country</label>
              <input type="text" class="form-control" name="country" placeholder="" required>
          </div>
          <br><br>
          <h2>Contact Person Details</h2>
          <div class="form-group">
              <label>Person Name</label>
              <input type="text" class="form-control" name="person_name" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Person Email</label>
              <input type="text" class="form-control" name="person_number" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Person Number</label>
              <input type="text" class="form-control" name="person_email" placeholder="" required>
          </div>

          <button type="submit" class="btn btn-primary float-right">Add</button>
      </form>
      <br><br>
    </div>
  </div>
</section>
@endsection
