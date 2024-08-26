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
    $allDoctor=User::all();
    $allDepartment=Department::all();
    return view ('frontend.home',compact('allDepartment','allDoctor'));




    }







}
