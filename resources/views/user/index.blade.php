@extends('layouts.app')
@section('pagename','User')
@section('content')


<section>

  <div class="row">
    <div class="col-md-12 mt-2">
      <a href="{{URL::to('/user/create')}}" class="float-right btn btn-primary">Create</a>
    </div>

    <div class="col-md-12 mt-3">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Type</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Store</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach(App\Models\User::all() as $data)
          <tr>
            <td>{{$data->usertype}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td> @if($data->storeid==NULL) @else {{App\Models\StoreHouse::find($data->storeid)->name}} @endif</td>
            <td> <a href="{{URL::to('/user/'.$data->id)}}" class="btn btn-primary btn-sm">View</a> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</section>
@endsection
