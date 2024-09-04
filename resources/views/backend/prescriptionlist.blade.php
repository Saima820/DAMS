@extends('backend.master')

@section('content')



<h1> Prescription List </h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Observation</th>
      <th scope="col">Assessment</th>
      <th scope="col">Medical Test</th>
      <th scope="col">Medication</th>
    </tr>
  </thead>
  <tbody>

  @foreach($allPrescription as $prescription)

    <tr>
      <th scope="row">{{$prescription->id}}</th>
      <td>{{$prescription->appointment->doctor->name}}</td>
      <td>{{$prescription->appointment->patient->patient_name}}</td>
      <td>{{$prescription->created_at}}</td>
      <td>{{$prescription->observation}}</td>
      <td>{{$prescription->assessment}}</td>
      <td>{{$prescription->medical_test}}</td>
      <td>{{$prescription->medication}}</td>

    </tr>
    @endforeach
  </tbody>
</table>





@endsection
