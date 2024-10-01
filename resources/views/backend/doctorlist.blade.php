@extends('backend.master')

@section('content')

<h1> Doctor List </h1>

<a class="btn btn-primary" href="{{route('doctor.form')}}">Add Doctor</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Doctor Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Specialist</th>
      <th scope="col">Status</th>
      <th scope="col">Visiting Charge</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($allDoctor as $key=>$doctor)

    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>
        <img src="{{url('/uploads/doctors/'.$doctor->image)}}" alt="" width="60">
      </td>
      <td>{{$doctor->name}}</td>
      <td>{{$doctor->email}}</td>
      <td>{{$doctor->phonenumber}}</td>
      <td>{{$doctor->department->name}}</td>
      <td>{{$doctor->status}}</td>
      <td>{{$doctor->visiting_charge}} BDT</td>

      <td>
        <a class="btn btn-info" href="{{route('doctor.view',$doctor->id)}}">View</a>
        <a class="btn btn-danger" href="{{route('doctor.delete',$doctor->id)}}">Delete</a>
        <a class="btn btn-warning" href="{{route('doctor.edit',$doctor->id)}}">Edit</a>
      </td>

    </tr>
    @endforeach

  </tbody>
</table>





@endsection
