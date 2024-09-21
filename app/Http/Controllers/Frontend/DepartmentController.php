<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{


   public function specificDepartment($id)
   {


    $relatedDoctor=User::where('department_id',$id)->get();

    //dd($relatedDoctor);
    return view('frontend.page.specific_department',compact('relatedDoctor'));
   }





}
