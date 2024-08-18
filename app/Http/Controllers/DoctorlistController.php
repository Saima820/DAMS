<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class DoctorlistController extends Controller
{
    public function doctorlist()
    {
        $allDoctor = User::with('department')->where('role','doctor')->get();
        //dd($allDoctor);
        return view ('backend.doctorlist',compact('allDoctor'));
    }

    public function form()
    {
        $allDepartment=Department::all();
        return view ('backend.doctorform',compact('allDepartment'));
    }

    public function store(Request $request)
    {

      //dd($request->all());
       $validation=Validator::make($request->all(),[
          'user_name'=>'required', //form er input name
          'email_address'=>'required|unique:users,email',
          'phone_number'=>'required',
          'password'=>'required',
          'department_id'=>'required',
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

          User::create([
            'name' => $request->user_name,
            'role' => 'doctor',
            'email' =>$request->email_address,
            'phonenumber' =>$request->phone_number,
            'password' =>$request->password,
            'department_id' =>$request->department_id,
            'status' =>$request->status,
            'image' =>$fileName
          ]);

          return redirect()->route('doctor.list');

    }

    public function viewDoctor($id)
    {
        $viewDoctor=User::find($id);
        return view ('backend.page.singleviewdoctor',compact('viewDoctor'));
    }

   }
