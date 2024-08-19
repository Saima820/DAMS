<?php

namespace App\Http\Controllers;
use App\Models\Appointment;

use Illuminate\Http\Request;

class AppointmentlistController extends Controller
{
    public function appointmentlist()
    {

        $allAppointment = Appointment::with('patient','doctor')->paginate(3);
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
            'amount' =>$request->amount,
            'trx_id' =>$request->trx
        ]);

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
    return redirect()->back();


    }

    public function report()
    {
        if(request()->has('from_date') && request()->has('to_date'))
        {
            $apReport = Appointment::whereBetween('appointment_date', [request()->from_date,request()->to_date])->get();
            return view('backend.report',compact('apReport'));
        }


        $apReport=Appointment::all();
        return view ('backend.report',compact('apReport'));
    }


}
