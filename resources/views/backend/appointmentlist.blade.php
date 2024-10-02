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
      <th scope="col">Payment Method</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Visiting Charge</th>
      <th scope="col">Action</th>



    </tr>
  </thead>
  <tbody>

  @foreach($allAppointment as $appointment)

    <tr>
      <th scope="row">{{$appointment->id}}</th>
      <td>{{$appointment->patient->patient_name}}</td>
      <td>{{$appointment->doctor->name}}</td>
      <td>{{$appointment->appointment_date}}</td>
      <td>{{$appointment->slot->timeslot}}</td>
      <td @if($appointment->status=='reject') style="background:red" @else  style="background:green" @endif>{{$appointment->status}}</td>
      <td>{{$appointment->payment_method}}</td>
      <td>{{$appointment->payment_status}}</td>
      <td>{{$appointment->doctor->visiting_charge}} BDT</td>



    <td style="display: flex;">

        @if($appointment->is_prescribed==1)
        <a class="btn btn-primary" href="{{route('prescription.view',$appointment->id)}}">view Prescription</a>
        @elseif($appointment->status == 'accept')
        <a class="btn btn-primary" href="{{route('prescription.add',$appointment->id)}}">add Prescription</a>
        @endif


        @if($appointment->status=='pending')
        <a class="btn btn-success m-1" href="{{route('appointment.accept',$appointment->id)}}">Accept</a>
        <a class="btn btn-danger m-1" href="{{route('appointment.reject',$appointment->id)}}">Reject</a>
        @endif


      </td>
    </tr>

    @endforeach

  </tbody>
</table>

{{ $allAppointment->links() }}

@endsection













