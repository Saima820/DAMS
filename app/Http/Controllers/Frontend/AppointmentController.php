<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function appointment(Request $request,$dId)
    {

        // dd( date('Y-m-d h:i:s A'));

        //validation

        $validation=Validator::make($request->all(),[
            'appointment_date'=>'required|after_or_equal:'. date('Y-m-d'), //form er input name

         ]);

         if($validation->fails())
         {
          notify()->error($validation->getMessageBag());
          return redirect()->back();
         }



        //query

        // $doctor=Doctor::find($dId);

        Appointment::create([
            'doctor_id'=>$dId,
            'patient_id'=>auth('patientG')->user()->id,
            'appointment_date'=>$request->appointment_date,
            'time_slot_id'=>$request->time_slot_id,
            'amount'=>1000
            //'amount'=>$doctor->visit_charge
        ]);


        notify()->success('Appointment successfull.');
        return redirect()->back();



    }



}
