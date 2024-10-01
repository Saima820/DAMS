<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class PatientController extends Controller
{
    public function registration(Request $request)
    {
        //step 1 Validation
         //dd($request->all());
         $validation=Validator::make($request->all(),[
         'patient_name'=>'required',
         'email'=>'required|email',
         'password'=>'required|min:6|confirmed',
         'mobile_number'=>'required|regex:/(01)[0-9]{9}/|min:11|max:11|unique:patients,mobile',
         'patient_image'=>'required|file'



        ]);

        if($validation->fails())
        {
            // dd($validation->getMessageBag());
            notify()->error($validation->getMessageBag()); //getMessageBag(shob message theke akta msg ana)
            return redirect()->back()->withInput();
        }
        //new add
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

        //query

        Patient::create([
            //left side e column name => right side e value (form input)
            'patient_name'=>$request->patient_name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'mobile'=>$request->mobile_number,
            'gender'=>$request->gender,
            'image'=>$fileName

        ]);

        notify()->success('patient registration successful');
        return redirect()->back();


    }

    //condition for login

    public function patientLogin(Request $request){

    //step 1 validation

    $validation=Validator::make($request->all(),[
        'email'=>'required|email',
        'password'=>'required|min:6'

    ]);

    if($validation->fails())
    {
        notify()->error($validation->getMessageBag());
        return redirect()->back();
    }

    //condition for login
    $credentials=$request->except('_token');

    //  $check=auth('patientGuard')->attempt($credentials);
    $check=Auth::guard('patientG')->attempt($credentials);

    // dd($check);
    if($check)
    {
        notify()->success('Login Success');
        return redirect()->route('home');
    }else
    {
        notify()->error('Login failed');
        return redirect()->route('home');
    }
}

    public function logout()
    {
        auth('patientG')->logout();

        notify()->success('Logout success');

        return redirect()->route('home');

    }


    public function viewProfile()
    {

        $allAppointment = Appointment::where('patient_id',auth('patientG')->user()->id)->orderBy('id','desc')->get();
        $myPrescription = Prescription::where('patient_id',auth('patientG')->user()->id)->get();
        // dd($myPrescription);
        return view('frontend.page.single_patient_profile',compact('allAppointment','myPrescription'));

    }



    public function editProfile()
    {
        $editPatient=Patient::find(auth('patientG')->user()->id);

        //dd ($editsinglePatient);
        return view('frontend.page.edit_profile',compact('editPatient'));
    }


    public function updateProfile(Request $request,$profileId)
    {

        //dd($request->all());

        //validation

        $validation=Validator::make($request->all(),[
            'patient_name'=>'required',
            'address'=>'required'

        ]);

        //query

        $updateProfile=Patient::find($profileId);
        $updateProfile->update([
        'patient_name'=>$request->patient_name,
        'email'=>$request->email
        ]);


        return redirect()->route('view.profile');
    }

    public function cancelAppointment($id)
    {

        $appointment=Appointment::find($id);
        $appointment->update([
            'status'=>'cancel'
        ]);

        notify()->success('Appointment cancel successful');
        return redirect()->back();

    }

    public function viewmyPrescription($id)
    {
        $myPrescription = Prescription::find($id);

       return view('frontend.page.view-myPrescription',compact('myPrescription'));
    }

}


