<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function allDoctor()
    {

        $doctor = User::all();
        return $this->responseSuccess($doctor,'all doctor');

    }
    public function storeDoctor(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'user_name'=>'required', //form er input name
            'email_address'=>'required|unique:users,email',
            'phone_number'=>'required|regex:/(01)[0-9]{9}/|min:11|max:11',
            'password'=>'required',
            'department_id'=>'required',
            'status'=>'required',
            'doctor_image'=>'required|file',
            'visiting_charge'=>'required',
         ]);

         if($validation->fails())
         {

          return response()->json([
            'success'=>false,
            'data'=>null,
            'message'=>$validation->getMessageBag(),
          ]);
         }
    //dd($request->all());
         $filename=null;

         //check file exits

         if($request->hasFile('doctor_image'))
         {
            $file=$request->file('doctor_image');

             //file name generate step 5

             $filename=date('Ymdhis').".".$file->getClientOriginalExtension();

             //file store where i want to step 6

             $file->storeAs('/doctors', $filename);



         }

             //step 7

        $doctor=    User::create([
              'name' => $request->user_name,
              'role' => 'doctor',
              'email' =>$request->email_address,
              'phonenumber' =>$request->phone_number,
              'password' =>$request->password,
              'department_id' =>$request->department_id,
              'status' =>$request->status,
              'image' =>$filename,
              'visiting_charge' =>$request->visiting_charge,

            ]);

            return response()->json([
                'success'=>true,
                'data'=>$doctor,
                'message'=>'doctor crated',
            ]);


    }


    public function updateDoctor($id)
    {
       return $this->responseSuccess('$doctor','$message');
    }


}
