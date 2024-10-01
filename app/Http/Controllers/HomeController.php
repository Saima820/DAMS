<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $allPatientCount=Patient::count();
        $allDepartmentCount=Department::count();
        $allAppointmentCount=Appointment::count();
        $allDoctorCount=User::where('role','doctor')->count();
        return view ('backend.home',compact('allPatientCount','allDepartmentCount','allAppointmentCount','allDoctorCount'));
    }
}
