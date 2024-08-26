<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $allPatientCount=Patient::count();
        $allDepartmentCount=Department::count();
        $allAppointmentCount=Appointment::count();
        return view ('backend.home',compact('allPatientCount','allDepartmentCount','allAppointmentCount'));
    }
}
