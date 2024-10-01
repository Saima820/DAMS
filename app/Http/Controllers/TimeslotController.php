<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function timeslot()
    {
        $alltimeslot=Timeslot::orderBy('id','DESC')->paginate(15);
        return view ('backend.time-slot-list',compact('alltimeslot'));
    }

    public function timeslotform()
    {
        return view ('backend.time-slot-form');
    }


    public function timeslotstore(Request $request)
    {
        Timeslot::create([
            'timeslot'=> $request->time_slot,
        ]);
        return redirect()->route('time.slot');
    }

    public function deleteTimeslot($id)
    {
        $deleteTimeslot=Timeslot::find($id)->delete();
        return redirect()->back();
    }
}
