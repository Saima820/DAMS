@extends('backend.master')

@section('content')

<form action="{{route('department.store')}}" method="post">
@csrf
<div class="mb-3">
    <label for="exampleInputName1" class="form-label"> Department Name</label>
    <input name="department_name" type="text" class="form-control" id="exampleInputName1" placeholder="Department Name" aria-describedby="nameHelp">
   </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
