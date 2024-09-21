<?php

namespace App\Http\Controllers;
use App\Models\Department;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function department()
    {
        $allDepartment = Department::orderBy('id', 'DESC')->paginate(10);
        return view ('backend.departmentlist',compact('allDepartment'));

    }

    public function form()
    {
        return view ('backend.departmentform');
    }

    public function store(Request $request)
    {

     // dd($request->all());


          Department::create([
            'name' => $request->department_name,

          ]);

          return redirect()->route('department.list');

    }
}
