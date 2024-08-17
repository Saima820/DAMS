<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;

class DepartmentController extends Controller
{


   public function specificDepartment($id)
   {


    $relatedDoctor=Doctor::where('department_id',$id)->get();
    //dd($relatedDoctor);
    return view('frontend.page.specific_department',compact('relatedDoctor'));
   }





}
