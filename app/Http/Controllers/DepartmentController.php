<?php

namespace App\Http\Controllers;
use App\Models\Department;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function department()
    {
        $allUser = department::paginate(3);
        return view ('backend.departmentlist',compact('allUser'));

    }

    public function form()
    {
        return view ('backend.departmentform');
    }

    public function store(Request $request)
    {

     // dd($request->all());


          Department::create([
            'name' => $request->user_name,
            'email' =>$request->email_address,
            'phonenumber' =>$request->phone_number
          ]);

          return redirect()->route('department.list');

    }
}
