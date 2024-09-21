@extends('frontend.master')


@section('content')



<div id="PrintArea">
    <!-- Header -->
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between">
            <!-- Doctor Information -->
            <div>
                <h5>{{$myPrescription->doctor->name}}</h5>
                <p>Visiting Charge:{{$myPrescription->doctor->visiting_charge}}</p>
                <p>Phone:{{$myPrescription->doctor->phonenumber}}</p>
            </div>
            <!-- Patient Information -->
            <div class="text-end">
                <h5>Patient Name:{{$myPrescription->patient->patient_name}}</h5>
                <p>phone:{{$myPrescription->patient->mobile}}</p>
                <p>Email:{{$myPrescription->patient->email}}</p>
                <p>Gender:{{$myPrescription->patient->gender}}</p>
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
                    <textarea name="observation"  readonly class="form-control" id="symptoms" rows="3" placeholder="Enter symptoms">{{$myPrescription->observation}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="diagnosis" class="form-label">Assessment</label>
                    <textarea name="assessment" readonly class="form-control" id="diagnosis" rows="3" placeholder="Enter diagnosis">{{$myPrescription->assessment}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="treatment" class="form-label">Medical Test</label>
                    <textarea name="medical_test" readonly class="form-control" id="treatment" rows="3" placeholder="Enter treatment">{{$myPrescription->medical_test}}</textarea>
                </div>


            </div>

            <!-- Right Section -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="prescriptionNotes" class="form-label">Medication</label>
                    <textarea name="medication"  readonly class="form-control" id="prescriptionNotes" rows="9" placeholder="Enter prescription notes">{{$myPrescription->medication}}</textarea>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer -->
    <!-- <footer class="bg-dark text-white text-center py-3">
        <p>Thank you, Patient</p>
    </footer> -->


            <button type="submit" class="btn btn-primary active" onClick="printReport()">Print</button>

<script type="text/javascript">

    function printReport()
    {
        var printContents = document.getElementById("PrintArea").innerHTML;

			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
    }
</script>


@endsection
