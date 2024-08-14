<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;

class DepartmentController extends Controller
{
   public function specificDepartment()
   {

    $allDoctor=Doctor::all();

    return view('frontend.page.specific_department',compact('allDoctor'));
   }

}
