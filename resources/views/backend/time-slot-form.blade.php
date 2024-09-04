@extends('backend.master')

@section('content')

<form action="{{route('time-slot.store')}}" method="post">
@csrf
<div class="mb-3">
    <label for="exampleInputName1" class="form-label">Time Slot</label>
    <input name="time_slot" type="text" class="form-control" id="exampleInputName1" placeholder="Time Slot" aria-describedby="nameHelp">
   </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection

