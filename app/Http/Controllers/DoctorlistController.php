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


       $validation=Validator::make($request->all(),[
          'user_name'=>'required', //form er input name
          'email_address'=>'required|email|unique:users,email',
          'phone_number'=>'required|regex:/(01)[0-9]{9}/|min:11|max:11',
          'password'=>'required',
          'department_id'=>'required',
          'status'=>'required',
          'doctor_image'=>'required|file',
          'visiting_charge'=>'required',
       ]);

       if($validation->fails())
       {
        notify()->error($validation->getMessageBag());
        return redirect()->back()->withInput();
       }
  //dd($request->all());
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
            'image' =>$fileName,
            'visiting_charge' =>$request->visiting_charge,

          ]);

          return redirect()->route('doctor.list');

    }

    public function viewDoctor($id)
    {
        $viewDoctor=User::find($id);
        return view ('backend.page.singleviewdoctor',compact('viewDoctor'));
    }

    public function deleteProfile($id)
    {
      $deleteDoctor=User::find($id)->delete();
      return redirect()->back();

    }


    public function editDoctor($id)
    {
        $editDoctor=User::find($id);
        $allDepartment=Department::all();
        return view('backend.page.edit-doctor',compact('editDoctor','allDepartment'));
    }

    public function updateDoctor(Request $request,$id)
    {
        //dd($request->all());
        //validation
        $updateDoctor=User::find($id);
        $validation=Validator::make($request->all(),[

        'user_name'=>'required',
        'email_address'=>'required|email',
        'phone_number'=>'required',



        ]);

        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }

        $updateDoctor=User::find($id);


        $filename=$updateDoctor->image;

        //check if file exits

        if($request->hasFile('doctor_image'))
        {
            $file=$request->file('doctor_image');

            //file name generate
            $filename=date('Ymdhis').".".$file->getClientOriginalExtension();


            $file->storeAs('/doctors', $filename);

        }


        //query

        $updateDoctor->update([
            'name'=>$request->user_name,
            'email'=>$request->email_address,
            'phonenumber'=>$request->phone_number,
            'image'=>$filename
        ]);

        notify()->success('Doctor updated successfully.');
        return redirect()->back();



    }




   }
