@extends('backend.master')

@section('content')

<form action="{{route('prescription.store')}}" method="post">
@csrf
<div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name</label>
    <input name="user_name" required type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
   </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email_address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
  <div class="mb-3">
    <label for="exampleInputPhonenumber1" class="form-label">Phone Number</label>
    <input name="phone_number" required type="text" class="form-control" id="exampleInputPhonenumber1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
