<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentEmail;
use App\Mail\RejectMail;
use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentlistController extends Controller
{
    public function appointmentlist()
    {
        //  dd(auth()->user());

        if(auth()->user()->role=='doctor'){

            $allAppointment = Appointment::with('patient','doctor','slot')->where('doctor_id',auth()->user()->id)->paginate(10);

        }else{

            $allAppointment = Appointment::with('patient','doctor','slot')->paginate(10);

        }

        //dd($allAppointment);
        return view ('backend.appointmentlist',compact('allAppointment'));
    }

    public function form()
    {
        return view ('backend.appointmentform');
    }

    public function store (Request $request)
    {
        //dd($request->all());
        Appointment::create([
            'patient_id' => $request->user_name,
            'doctor_id' =>$request->dotor_name,
            'appointment_date' =>$request->appointment_date,
            'time_slot_id' =>$request->time_slot,
            'status' =>$request->status,
            'payment_method' =>$request->payment_method,
            'visiting_charge' =>$request->visiting_charge,
            'trx_id' =>$request->trx
        ]);

        notify()->success('Appointment success.');
        return redirect()->route('appointment.list');
    }

    public function accept($aId)
    {
       $appointment=Appointment::find($aId);

        //dd($appointment);

    $appointment->update([
        'status'=>'accept'
    ]);

    notify()->success('Your appointment accepted.');

    //send appointment confirmation mail
    Mail::to($appointment->patient->email)->send(new AppointmentEmail($appointment));

    return redirect()->back();

    }


    public function addPrescription($id)
    {
        $viewPrescription=Appointment::with('patient','doctor')->find($id);
        // dd($viewPrescription);
        return view('backend.page.prescription-add',compact('viewPrescription'));
    }


    public function createPrescription(Request $request,$id)
    {
        $appointment=Appointment::find($id);

        Prescription::create([
         'doctor_id'=>$appointment->doctor_id,
         'patient_id'=>$appointment->patient_id,
         'appointment_id'=>$id,
         'observation'=>$request->observation,
         'assessment'=>$request->assessment,
         'medical_test'=>$request->medical_test,
         'medication'=>$request->medication,
        ]);

        $appointment->update([

            'is_prescribed'=>true
        ]);



        notify()->success('Prescription created successfully');
        return redirect()->back();

    }


    public function report()
    {
        if(request()->has('from_date') && request()->has('to_date'))
        {
            $apReport = Appointment::with('slot')
            ->whereBetween('appointment_date', [request()->from_date,request()->to_date])->get();
            return view('backend.report',compact('apReport'));
        }


        $apReport=Appointment::with('slot')->get();
        return view ('backend.report',compact('apReport'));
    }


    public function reject($id)
    {
        $appointment=Appointment::find($id);
        $appointment->update([

            'status'=>'reject'

        ]);

        notify()->success('Your appointment Rejected.');

        //send appointment confirmation mail
        Mail::to($appointment->patient->email)->send(new RejectMail($appointment));

        return redirect()->back();

    }


}
