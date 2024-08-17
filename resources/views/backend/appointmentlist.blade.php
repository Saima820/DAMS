@extends('backend.master')

@section('content')



<h1> Appointment List </h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Time Slot</th>
      <th scope="col">Status</th>
      <th scope="col">Payment</th>
      <th scope="col">Amount</th>
      <th scope="col">transaction</th>


    </tr>
  </thead>
  <tbody>

  @foreach($allAppointment as $appointment)
    <tr>
      <th scope="row">{{$appointment->id}}</th>
      <td>{{$appointment->patient->patient_name}}</td>
      <td>{{$appointment->doctor->name}}</td>
      <td>{{$appointment->appointment_date}}</td>
      <td>{{$appointment->time_slot_id}}</td>
      <td>{{$appointment->status}}</td>
      <td>{{$appointment->payment_method}}</td>
      <td>{{$appointment->amount}}</td>
      <td>{{$appointment->trx_id}}</td>


    <td>
        <a class="btn btn-info" href="#">View</a>

        @if($appointment->status=='pending')
        <a class="btn btn-success" href="{{route('appointment.accept',$appointment->id)}}">Accept</a>
        <a class="btn btn-danger" href="#">Reject</a>
        @endif


      </td>
    </tr>

    @endforeach

  </tbody>
</table>

{{ $allAppointment->links() }}

<a class="btn btn-primary" href="{{route('appointment.form')}}">Add Appointment</a>

@endsection













