<?php

use App\Http\Controllers\API\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/get-alldoctor',[DoctorController::class,'allDoctor']);

Route::post('/store/doctors',[DoctorController::class,'storeDoctor']);

// Route::post('/update-doctor/{$id}',[DoctorController::class,'updateDoctor']);
