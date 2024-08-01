@extends('backend.master')

@section('content')

<form action="{{route('patient.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name</label>
    <input name="patient_name" required type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
   </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email_address" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
  <div class="mb-3">
    <label for="exampleInputPhonenumber1" class="form-label">Phone Number</label>
    <input name="phone_number" required type="text" class="form-control" id="exampleInputPhonenumber1">
  </div>

  <div class="mb-3">
    <label for="exampleInputDOB1" class="form-label">DOB</label>
    <input name="dob" required type="text" class="form-control" id="exampleInputDOB1">
  </div>

  <div class="mb-3">
    <label for="exampleInputAddress1" class="form-label">Address</label>
    <input name="address" type="text" class="form-control" id="exampleInputAddress1">
  </div>

  <div class="mb-3">
    <label for="iamge" class="form-label">Upload Patient Image</label>
    <input name="patient_image" type="file" class="form-control" id="image">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
