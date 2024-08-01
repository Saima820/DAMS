@extends('backend.master')

@section('content')


<h1> Patient List </h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Patient Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">DOB</th>
      <th scope="col">Address</th>
      <th scope="col">action</th>

    </tr>
  </thead>
  <tbody>

  @foreach($allPatient as $patient)
    <tr>
      <th scope="row">{{$patient->id}}</th>
      <td>
        <img src="{{url('/uploads/patients/'.$patient->image)}}" alt="" width="60">
      </td>
      <td>{{$patient->patient_name}}</td>
      <td>{{$patient->email}}</td>
      <td>{{$patient->mobile}}</td>
      <td>{{$patient->dob}}</td>
      <td>{{$patient->address}}</td>



      <td>
        <a class="btn btn-info" href="#">View</a>
        <a class="btn btn-danger" href="#">Delete</a>
        <a class="btn btn-warning" href="#">Edit</a>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>
<a class="btn btn-primary" href="{{route('patient.form')}}">Add Patient</a>

@endsection
