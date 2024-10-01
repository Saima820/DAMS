@extends('backend.master')

@section('content')



<h1> Time Slot </h1>
<a class="btn btn-primary" href="{{route('time-slot.form')}}">Add Timeslot</a>
<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">Time Slot</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($alltimeslot as $key=>$timeslot)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$timeslot->timeslot}}</td>



      <td>

        <a class="btn btn-danger" href="{{route('delete.timeslot',$timeslot->id)}}">Delete</a>
        <!-- <a class="btn btn-warning" href="#">Edit</a> -->
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

{{$alltimeslot->links()}}



@endsection
