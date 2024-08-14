@extends('backend.master')

@section('content')

<form action="{{route('appointment.store')}}" method="post">
@csrf
<div class="mb-3">
    <label for="exampleInputName1" class="form-label"> Patient Name</label>
    <input name="user_name" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
   </div>

   <div class="mb-3">
    <label for="exampleInputdocName1" class="form-label"> Doctor Name</label>
    <input name="doctor_name" type="text" class="form-control" id="exampleInputdocName1" aria-describedby="nameHelp">
   </div>

  <div class="mb-3">
    <label for="exampleInputAppointmentdate1" class="form-label">Appointment Date</label>
    <input name="appointment_date" type="date" class="form-control" id="exampleInputAppointmentdate1" aria-describedby="emailHelp">
   </div>

  <div class="mb-3">
    <label for="exampleInputTimeslot1" class="form-label">Time Slot</label>
       <select name="time_slot" id="" class="form-control">
                                    <option value="1">10-11</option>
                                    <option value="2">11-12</option>
                                    <option value="3">12-1:00</option>
                                   </select>
  </div>




  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">Status</label>
    <input name="status" type="text" class="form-control" id="exampleInputStatus1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPayment1" class="form-label">Payment</label>
    <input name="payment_method" type="text" class="form-control" id="exampleInputPayment1">
  </div>

  <div class="mb-3">
    <label for="exampleInputAmount1" class="form-label">Amount</label>
    <input name="amount" type="text" class="form-control" id="exampleInputAmount1">
  </div>

  <div class="mb-3">
    <label for="exampleInputTransaction1" class="form-label">Transaction</label>
    <input name="trx" type="text" class="form-control" id="exampleInputTransaction1">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
