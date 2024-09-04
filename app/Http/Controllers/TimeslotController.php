<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function timeslot()
    {
        $alltimeslot=Timeslot::paginate(8);
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
}
