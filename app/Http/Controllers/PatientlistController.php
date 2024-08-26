<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientlistController extends Controller
{
    public function patientlist()
    {
        $allPatient = patient::all();
        return view ('backend.patientlist',compact('allPatient'));

    }

    public function form()
    {
        return view ('backend.patientform');
    }

    public function store(Request $request)
    {

     $validation=Validator::make($request->all(),[
        'patient_name'=>'required',
        'email_address'=>'required',
        'phone_number'=>'required',
        'dob'=>'required',
        'address'=>'required',
        'patient_image'=>'required|file'
     ]);

     if($validation->fails())
     {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
     }

       $fileName=null;
       //check file exits
       if($request->hasFile('patient_image'))
       {
        $file=$request->file('patient_image');

        //file name generate step 5
        $fileName=date('Ymdhis').".".$file->getClientOriginalExtension();

         //file store where i want to step 6

         $file->storeAs('/patients',$fileName);
       }


          Patient::create([
            'patient_name' => $request->patient_name,
            'email' =>$request->email_address,
            'phonenumber' =>$request->phone_number,
            'dob' =>$request->dob,
            'address' =>$request->address,
            'image' =>$fileName


          ]);

          return redirect()->route('patient.list');

    }


    public function viewPatient($id)
    {
        $viewPatient=Patient::find($id);
        return view('backend.page.single-patient-view',compact('viewPatient'));
    }



}
