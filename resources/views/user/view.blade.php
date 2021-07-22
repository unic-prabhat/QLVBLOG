@extends('layouts.app')
@section('pagename','User View')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style media="screen">
.modal a.close-modal {
  top: 2.5px;
  right: 2.5px;
}
</style>
@endsection
@section('content')
<section>
   <div class="row">
     <div class="col-md-12">
       <h2>View User Details
         <a href="{{URL::to('/user/deletestore/'.$data->id)}}" onclick="return confirm('Are you sure want to delete this store?')" class="btn btn-danger float-right">Delete</a>
         <a href="{{URL::to('/user/'.$data->id.'/edit')}}" class="btn btn-info float-right mr-2">Edit</a>
         <a href="#ex1" rel="modal:open" class="btn btn-info float-right mr-2" >Reset Password</a>
         <div id="ex1" class="modal">
            <h3>Password Reset</h3>
            <form class="" action="{{URL::to('/user/passwordreset')}}" method="post">
              @csrf
              <input type="text" name="id" value="{{$data->id}}" hidden>
              <div class="form-group">
                <input type="text" class="form-control" name="password" placeholder="Enter new password">
              </div>
              <div class="form-group">
                <input type="submit"value="Update" class="btn btn-primary">
              </div>
            </form>
          </div>

       </h2>
     </div>
     <div class="col-md-12">
       <h5><b>Name:</b> {{$data->name}}</h5>
       <h5><b>Email:</b> {{$data->email}}</h5>
       <h5><b>Contact:</b> {{$data->contact}}</h5>
       <h5><b>Zipcode:</b> {{$data->zipcode}}</h5>
       <h5><b>City:</b> {{$data->city}}</h5>
       <h5><b>State:</b> {{$data->state}}</h5>
       <h5><b>Country:</b> {{$data->country}}</h5>
       <h5><b>Address1:</b> {{$data->address1}}</h5>
       <h5><b>Address2:</b> {{$data->address2}}</h5>
       <h5><b>Store:</b>  @if($data->storeid==NULL) @else {{App\Models\StoreHouse::find($data->storeid)->name}} @endif </h5>
     </div>
   </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

@endsection
