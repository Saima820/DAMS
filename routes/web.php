<?php



use App\Http\Controllers\HomeController;



use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PatientlistController;
use App\Http\Controllers\AppointmentlistController;
use App\Http\Controllers\DoctorlistController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ReportController;


use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\DoctorController as FrontendDoctorController;
use App\Http\Controllers\Frontend\PatientController as FrontendPatientController;


use Illuminate\Support\Facades\Route;



//for website

Route::get('/',[FrontendHomeController::class,'home'])->name('home');

//all doctors
Route::get('/all-doctors',[FrontendDoctorController::class,'allDoctor'])->name('frontend.alldoctors');

//patient registration,login and logout
Route::post('/registration',[FrontendPatientController::class,'registration'])->name('patient.registration');
Route::post('/do-login',[FrontendPatientController::class,'patientLogin'])->name('patient.login');
Route::get('/logout',[FrontendPatientController::class,'logout'])->name('patient.logout');

//Doctor view (single)
Route::get('/view-profile/{doctorView}',[FrontendDoctorController::class,'viewProfile'])->name('view.profile');
//delete doctor from backend
Route::get('/delete-profile/{doctorDelete}',[FrontendDoctorController::class,'deleteProfile'])->name('doctor.delete');




//for admin

// Route::httpVerb('/route',[ControllerName::class,'methodName']);

Route::group(['prefix' => 'admin'],function() {
Route::get('/login',[AuthenticationController::class,'loginForm'])->name('login');
Route::post('/do-login',[AuthenticationController::class, 'doLogin'])->name('do.login');

Route::group(['middleware'=>'auth'],function(){

Route::get('/',[HomeController::class,'home'])->name('dashboard');

//Patient List
Route::get('/patientlist',[PatientlistController::class,'patientlist'])->name('patient.list');
Route::get('/patient-form',[PatientlistController::class,'form'])->name('patient.form');
Route::post('/Patient-store',[PatientlistController::class,'store'])->name('patient.store');


//Doctor List
Route::get('/doctor-list',[DoctorlistController::class,'doctorlist'])->name('doctor.list');
Route::get('/doctor-form',[DoctorlistController::class,'form'])->name('doctor.form');
Route::post('/doctor-store',[DoctorlistController::class,'store'])->name('doctor.store');
//view doctor from backend
Route::get('/doctor/view/{doc_id}',[DoctorlistController::class,'viewDoctor'])->name('doctor.view');
//edit doctor from backend
//Route::get('/doctor/edit/{doc_id}',[DoctorlistController::class,'editDoctor'])->name('doctor.edit');
//update doctor from backend
//Route::get('/doctor/update/{doc_id}',[DoctorlistController::class,'updateDoctor'])->name('doctor.update');



//Appointment List
Route::get('/appointmentlist',[AppointmentlistController::class,'appointmentlist'])->name('appointment.list');
Route::get('/appointment-form',[AppointmentlistController::class,'form'])->name('appointment.form');
Route::post('/appointment-store',[AppointmentlistController::class,'store'])->name('appointment.store');

//Payment List
Route::get('/payment',[PaymentController::class,'payment'])->name('payment.gateway');
Route::get('/payment-form',[PaymentController::class,'form'])->name('payment.form');
Route::post('/payment-store',[PaymentController::class,'store'])->name('payment.store');

//Department List
Route::get('/department',[DepartmentController::class,'department'])->name('department.list');
Route::get('/department-form',[DepartmentController::class,'form'])->name('department.form');
Route::post('/department-store',[DepartmentController::class,'store'])->name('department.store');

//Prescription List
Route::get('/prescription',[PrescriptionController::class,'prescription'])->name('prescription.list');
Route::get('/prescription-form',[PrescriptionController::class,'form'])->name('prescription.form');
Route::post('/prescription-store',[PrescriptionController::class,'store'])->name('prescription.store');

//Report
Route::get('/report',[ReportController::class,'report']);

Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');




});

});








