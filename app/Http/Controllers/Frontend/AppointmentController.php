<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AppointmentController extends Controller
{
    public function appointment(Request $request,$dId)
    {

        // dd( date('Y-m-d h:i:s A'));
        //dd($request->all());
        //validation

        $validation=Validator::make($request->all(),[
            'appointment_date'=>'required|after_or_equal:'. date('Y-m-d'), //form er input name

         ]);

         if($validation->fails())
         {
          notify()->error($validation->getMessageBag());
          return redirect()->back();
         }


         //dd($request->all());
        //query

        // $doctor=Doctor::find($dId);
        try{

            DB::beginTransaction();


            //check if patient can take appointment
            $checkAppointment=Appointment::where('doctor_id',$dId)
                            ->where('patient_id',auth('patientG')->user()->id)
                            ->whereDate('appointment_date',date('y-m-d',strtotime($request->appointment_date)))
                            ->first();

            if(!$checkAppointment)
            {

                $appointment=Appointment::create([
                    'doctor_id'=>$dId,
                    'patient_id'=>auth('patientG')->user()->id,
                    'appointment_date'=>$request->appointment_date,
                    'time_slot_id'=>$request->time_slot_id,
                    'visiting_charge'=>$request->visiting_charge
                ]);
                DB::commit();



                //call ssl commerz to pay
                $payment=new PaymentController();

                $payment->payNow($appointment);
            }else{
                notify()->error('You have apppointment on this date.');
                return redirect()->back();
            }





        }catch(Throwable $exception){

            DB::rollBack();
            notify()->error($exception->getMessage());
            return redirect()->back();
        }






        notify()->success('Appointment successfull.');
        return redirect()->back();
 }



}
