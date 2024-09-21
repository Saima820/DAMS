@extends('backend.master')


@section('content')

<form action="{{route('prescription.create',$viewPrescription->id)}}" method="post">
 @csrf

    <!-- Header -->
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between">
            <!-- Doctor Information -->
            <div>
                <h5>{{$viewPrescription->doctor->name}}</h5>
                <p>Visiting Charge:{{$viewPrescription->doctor->visiting_charge}}</p>
                <p>Phone:{{$viewPrescription->doctor->phonenumber}}</p>
            </div>
            <!-- Patient Information -->
            <div class="text-end">
                <h5>Patient Name:{{$viewPrescription->patient->patient_name}}</h5>
                <p>phone:{{$viewPrescription->patient->mobile}}</p>
                <p>Email:{{$viewPrescription->patient->email}}</p>
                <p>Gender:{{$viewPrescription->patient->gender}}</p>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Left Section -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="symptoms" class="form-label">Observation</label>
                    <textarea name="observation" class="form-control" id="symptoms" rows="3" placeholder="Enter symptoms"></textarea>
                </div>
                <div class="mb-3">
                    <label for="diagnosis" class="form-label">Assessment</label>
                    <textarea name="assessment" class="form-control" id="diagnosis" rows="3" placeholder="Enter diagnosis"></textarea>
                </div>
                <div class="mb-3">
                    <label for="treatment" class="form-label">Medical Test</label>
                    <textarea name="medical_test" class="form-control" id="treatment" rows="3" placeholder="Enter treatment"></textarea>
                </div>


            </div>

            <!-- Right Section -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="prescriptionNotes" class="form-label">Medication</label>
                    <textarea name="medication" class="form-control" id="prescriptionNotes" rows="9" placeholder="Enter prescription notes"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <!-- <footer class="bg-dark text-white text-center py-3">
        <p>Thank you, Patient</p>
    </footer> -->

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
