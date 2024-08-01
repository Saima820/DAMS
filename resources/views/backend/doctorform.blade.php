@extends('backend.master')

@section('content')

<form action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">
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
    <input name="phone_number" type="text" class="form-control" id="exampleInputPhonenumber1">
  </div>


  <div class="mb-3">
    <label for="exampleInputSpecialist1" class="form-label"> Select Specialist</label>
    <input name="specialist" type="text" class="form-control" id="exampleInputSpecialist1">
  </div>






  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">Status</label>
    <input name="status" type="text" class="form-control" id="exampleInputStatus1">
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Upload Doctor Image</label>
    <input name="doctor_image" type="file" class="form-control" id="image">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
