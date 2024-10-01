<?php

namespace App\Http\Controllers;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

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
        $validation=Validator::make($request->all(),[
            'department_name'=>'required|unique:departments,name'
        ]);

        if($validation->fails())
        {
            // dd($validation->getMessageBag());
            notify()->error($validation->getMessageBag());
            return redirect()->back();
        }
     // dd($request->all());


          Department::create([
            'name' => $request->department_name,

          ]);

          return redirect()->route('department.list');

    }

    public function deleteDepartment($id)
    {
        try{
            $deleteDepartment=Department::find($id)->delete();
            return redirect()->back();
        }catch(Throwable $e){
            notify()->error('You cannot delete it.');
            return redirect()->back();
        }

    }
}
