@extends('backend.master')

@section('content')




<h1>  Appointment Report </h1>
<form action="{{route('appointment.report')}}">

<label for=""> From date </label>
<input required value="{{request()->from_date}}" name="from_date" type="date" placeholder="From date" class="form-control">

<label for=""> To date </label>
<input required value="{{request()->to_date}}" name="to_date" type="date" placeholder="To date" class="form-control">

<button type="submit" class="btn btn-success">Search</button>

</form>
<div id="PrintArea">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1> Appointment List Report</h1>
            <h4>Date: {{request()->from_date}} to {{request()->to_date}}</h4>
        </div>
        <div class="col-md-4"></div>
    </div>

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
      <th scope="col">Visiting Charge</th>
      <!-- <th scope="col">transaction</th> -->


    </tr>
  </thead>
  <tbody>

  @foreach($apReport as $report)
    <tr>
      <th scope="row">{{$report->id}}</th>
      <td>{{$report->patient->patient_name}}</td>
      <td>{{$report->doctor->name}}</td>
      <td>{{$report->appointment_date}}</td>
      <td>{{$report->slot->timeslot}}</td>
      <td>{{$report->status}}</td>
      <td>{{$report->payment_method}}</td>
      <td>{{$report->visiting_charge}} BDT</td>
      <!-- <td>{{$report->trx_id}}</td> -->


    @endforeach

  </tbody>
</table>
</div>
<button type="submit" class="btn btn-primary active" onClick="printReport()">Print</button>

<script type="text/javascript">

    function printReport()
    {
        var printContents = document.getElementById("PrintArea").innerHTML;

			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
    }
</script>




@endsection














