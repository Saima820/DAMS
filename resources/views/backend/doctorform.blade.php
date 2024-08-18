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
    <input required name="phone_number" type="text" class="form-control" id="exampleInputPhonenumber1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>


  <div class="mb-3">
    <label for="exampleInputDepartment1" class="form-label"> Select Department</label>
    <select required name="department_id" type="text" class="form-control" id="exampleInputDepartment1">

    @foreach ($allDepartment as $department)
    <option value="{{$department->id}}">{{$department->name}}</option>
     @endforeach

    </select>
  </div>



  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">Status</label>
       <select name="status" type="text" id="exampleInputStatus1" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>

        </select>
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Upload Doctor Image</label>
    <input name="doctor_image" type="file" class="form-control" id="image">
  </div>







  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
