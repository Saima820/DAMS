<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Department;

class HomeController extends Controller
{
    public function home()
    {
    $allDepartment=Department::all();
    return view ('frontend.home',compact('allDepartment'));


    }





}
