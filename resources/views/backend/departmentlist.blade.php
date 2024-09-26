@extends('backend.master')

@section('content')



<h1> Department List </h1>

<a class="btn btn-primary" href="{{route('department.form')}}">Add Department</a>

<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">Department Name</th>
      <th scope="col">Status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($allDepartment as  $key=>$department)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$department->name}}</td>
      <td>{{$department->status}}</td>


      <td>

        <a class="btn btn-danger" href="{{route('delete.department',$department->id)}}">Delete</a>

      </td>
    </tr>

    @endforeach

  </tbody>
</table>

{{$allDepartment->links()}}



@endsection
