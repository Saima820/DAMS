<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Department;
use App\Models\Patient;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {

    $allDoctor=User::with('department')
    ->where('role','doctor')
    ->get();
     //dd($allDoctor);
    $allDepartment=Department::all();

    return view ('frontend.home',compact('allDepartment','allDoctor'));




    }




    public function changeLang($langName)
    {
        session()->put('locale',$langName);
        return redirect()->back(); 
    }







}
