<?php

namespace App\Http\Controllers;

use App\Models\User;

abstract class Controller
{
    public function responseSuccess($doctor,$message)
    {

        return response()->json([
            'success'=>true,
            'message'=>'showing all the doctor list',
            'data'=>$doctor,
        ]);
    }

    public function responseFailed($message)
    {
        return response()->json([
            'success'=>false,
            'message'=>$message,
            'data'=>null
           ]);
    }
}
