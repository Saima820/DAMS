<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class DoctorlistController extends Controller
{
    public function doctorlist()
    {
        $allDoctor = doctor::all();
        return view ('backend.doctorlist',compact('allDoctor'));
    }

    public function form()
    {
        return view ('backend.doctorform');
    }

    public function store(Request $request)
    {


       $validation=Validator::make($request->all(),[
          'user_name'=>'required', //form er input name
          'email_address'=>'required',
          'phone_number'=>'required',
          'specialist'=>'required',
          'status'=>'required',
          'doctor_image'=>'required|file'
       ]);

       if($validation->fails())
       {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
       }

       $filename=null;

       //check file exits

       if($request->hasFile('doctor_image'))
       {
          $file=$request->file('doctor_image');

           //file name generate step 5

           $fileName=date('Ymdhis').".".$file->getClientOriginalExtension();

           //file store where i want to step 6

           $file->storeAs('/doctors', $fileName);



       }

           //step 7

          Doctor::create([
            'name' => $request->user_name,
            'email' =>$request->email_address,
            'phonenumber' =>$request->phone_number,
            'specialist' =>$request->specialist,
            'status' =>$request->status,
            'image' =>$fileName
          ]);

          return redirect()->route('doctor.list');

    }

    public function viewDoctor($id)
    {
        $viewDoctor=Doctor::find($id);
        return view ('backend.page.singleviewdoctor',compact('viewDoctor'));
    }

   }
