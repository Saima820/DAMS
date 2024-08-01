<?php

namespace App\Http\Controllers;
use App\Models\Payment;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        return view ('backend.paymentgateway');
    }

    public function form()
    {
        return view ('backend.paymentform');
    }

    public function store(Request $request)
    {

     // dd($request->all());


          Payment::create([
            'name' => $request->user_name,
            'email' =>$request->email_address,
            'phonenumber' =>$request->phone_number
          ]);

          return redirect()->route('payment.gateway');

    }

}
