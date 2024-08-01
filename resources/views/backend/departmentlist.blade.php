@extends('backend.master')

@section('content')



<h1> Department List </h1>
<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($allUser as $department)
    <tr>
      <th scope="row">{{$department->id}}</th>
      <td>{{$department->name}}</td>
      <td>{{$department->email}}</td>
      <td>{{$department->phonenumber}}</td>

      <td>
        <a class="btn btn-info" href="#">View</a>
        <a class="btn btn-danger" href="#">Delete</a>
        <a class="btn btn-warning" href="#">Edit</a>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

{{$allUser->links()}}

<a class="btn btn-primary" href="{{route('department.form')}}">Add Department</a>

@endsection
