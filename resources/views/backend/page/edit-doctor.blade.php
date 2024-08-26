@extends('backend.master')

@section('content')

<form action="{{route('doctor.update',$editDoctor->id)}}" method="post" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name</label>
    <input name="user_name" value="{{$editDoctor->name}}" required type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
   </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email_address" required value="{{$editDoctor->email}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>

  <div class="mb-3">
    <label for="exampleInputPhonenumber1" class="form-label">Phone Number</label>
    <input  name="phone_number" value="{{$editDoctor->phonenumber}}" required type="text" class="form-control" id="exampleInputPhonenumber1">
  </div>

  <div class="mb-3">
    <label for="exampleInputDepartment1" class="form-label"> Select Department</label>
    <select  name="department_id" value="{{$editDoctor->department->name}}" required type="text" class="form-control" id="exampleInputDepartment1">

    @foreach ($allDepartment as $department)
    <option value="{{$department->id}}">{{$department->name}}</option>
     @endforeach

    </select>
  </div>



  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">Status</label>
       <select name="status" value="{{$editDoctor->status}}" type="text" id="exampleInputStatus1" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>

        </select>
  </div>


  <div class="mb-3">
    <label for="exampleInputCharge1" class="form-label">Visiting Charge</label>
    <input required name="visiting_charge" value="{{$editDoctor->visiting_charge}}" type="text" class="form-control" id="exampleInputCharge1">
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Upload Doctor Image</label>
    <input name="doctor_image" value="{{$editDoctor->image}}" type="file" class="form-control" id="image">
  </div>







  <button type="submit" id="submit" class="btn btn-primary">Update</button>
</form>


@endsection
