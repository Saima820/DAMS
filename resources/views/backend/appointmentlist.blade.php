@extends('backend.master')

@section('content')



<h1> Appointment List </h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>
  <tbody>

  @foreach($allUser as $appointment)
    <tr>
      <th scope="row">{{$appointment->id}}</th>
      <td>{{$appointment->name}}</td>
      <td>{{$appointment->email}}</td>
      <td>{{$appointment->phonenumber}}</td>

      <td>
        <a class="btn btn-info" href="#">View</a>
        <a class="btn btn-danger" href="#">Delete</a>
        <a class="btn btn-warning" href="#">Edit</a>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

{{ $allUser->links() }}

<a class="btn btn-primary" href="{{route('appointment.form')}}">Add Appointment</a>

@endsection
