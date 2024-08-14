<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
  public function allDoctor()
  {
    $allDoctor=Doctor::all();
    return view ('frontend.alldoctors',compact('allDoctor'));
  }

  public function viewProfile($id)
  {
    $singleDoctor=Doctor::find($id);
    return view ('frontend.page.single_doctor',compact('singleDoctor'));
  }

  public function deleteProfile($id)
  {
    $deleteDoctor=Doctor::find($id)->delete();
    return redirect()->back();

  }


  public function search()

  {
    //dd(request()->all());
    $allDoctor=Doctor::where('name','LIKE','%'.request()->search_key.'%')->get();
    //where('column name', 'condition', '%value%')
    return view('frontend.page.search',compact('allDoctor'));

  }
}

