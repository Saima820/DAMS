<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Timeslot;
use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
  public function allDoctor()
  {
    $allDoctor=User::all();
    return view ('frontend.alldoctors',compact('allDoctor'));
  }

  public function viewProfile($id)
  {
    $singleDoctor=User::find($id);
    $alltimeslot=Timeslot::all();
    return view ('frontend.page.single_doctor',compact('singleDoctor','alltimeslot'));
  }




  public function search()

  {
    //dd(request()->all());
    $allDoctor=User::where('name','LIKE','%'.request()->search_key.'%')->get();


    //where('column name', 'condition', '%value%')
    return view('frontend.page.search',compact('allDoctor'));

  }

}

