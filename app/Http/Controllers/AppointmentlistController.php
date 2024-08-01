<?php

namespace App\Http\Controllers;
use App\Models\Appointment;

use Illuminate\Http\Request;

class AppointmentlistController extends Controller
{
    public function appointmentlist()
    {
        $allUser = appointment::paginate(3);
        return view ('backend.appointmentlist',compact('allUser'));
    }

    public function form()
    {
        return view ('backend.appointmentform');
    }

    public function store (Request $request)
    {
        //dd($request->all());
        Appointment::create([
            'name' => $request->user_name,
            'email' =>$request->email_address,
            'phonenumber' =>$request->phone_number
          ]);

          return redirect()->route('appointment.list');
    }
}
