@extends('frontend.master')

@section('content')


<form action="{{route('update.profile',$editPatient->id)}}" method="post">
    @csrf
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="{{url('/uploads/patients/'.auth('patientG')->user()->image)}}" alt="Maxwell Admin">
				</div>
				<h5 class="user-name">{{auth('patientG')->user()->patient_name}}</h5>
				<h6 class="user-email">{{auth('patientG')->user()->email}}</h6>
			</div>

		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input name="patient_name" value="{{auth('patientG')->user()->patient_name}}" type="text" class="form-control" id="fullName" placeholder="Enter full name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input name="email" value="{{auth('patientG')->user()->email}}" type="email" class="form-control" id="eMail" placeholder="Enter email ID">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input value="{{auth('patientG')->user()->mobile}}" type="text" class="form-control" id="phone" placeholder="Enter phone number">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="address">Address</label>
					<input value="{{auth('patientG')->user()->address}}" type="url" class="form-control" id="website" placeholder="address">
				</div>
			</div>
		</div>

		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">

					<button type="submit" id="submit" class="btn btn-primary active">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</form>

@endsection
