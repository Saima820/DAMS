<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function prescription()
    {
        return view ('backend.prescriptionlist');
    }

    public function form()
    {
        return view ('backend.prescriptionform');
    }

    public function store(Request $request)
    {

     // dd($request->all());

     $validation=Validator::make($request->all(),
        [
            'user_name'=>'required|min:10',
            'email_address'=>'required',
            'phone_number'=>'required|min:11'
        ]);

      if($validation->fails())
      {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
      }


          Prescription::create([
            'name' => $request->user_name,
            'email' =>$request->email_address,
            'phonenumber' =>$request->phone_number
          ]);

          return redirect()->route('prescription.list');

    }
}
