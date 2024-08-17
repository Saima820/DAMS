<?php



use App\Http\Controllers\HomeController;



use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PatientlistController;
use App\Http\Controllers\AppointmentlistController;
use App\Http\Controllers\DoctorlistController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ReportController;


use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\DoctorController as FrontendDoctorController;
use App\Http\Controllers\Frontend\PatientController as FrontendPatientController;
use App\Http\Controllers\Frontend\DepartmentController as FrontendDepartmentController;


use Illuminate\Support\Facades\Route;



//for website

Route::get('/',[FrontendHomeController::class,'home'])->name('home');

//all doctors
Route::get('/all-doctors',[FrontendDoctorController::class,'allDoctor'])->name('frontend.alldoctors');

//patient registration,login
Route::post('/registration',[FrontendPatientController::class,'registration'])->name('patient.registration');
Route::post('/do-login',[FrontendPatientController::class,'patientLogin'])->name('patient.login');


//Single doctor view
Route::get('/view-profile/{doctorID}',[FrontendDoctorController::class,'viewProfile'])->name('view.docprofile');


//Single Department
Route::get('/specific-department/{id}',[FrontendDepartmentController::class,'specificDepartment'])->name('specific.department');

//search
Route::get('/search',[FrontendDoctorController::class,'search'])->name('search');

//delete doctor from backend--- need to change
Route::get('/delete-profile/{doctorID}',[FrontendDoctorController::class,'deleteProfile'])->name('doctor.delete');



Route::group(['middleware'=>'patientAuth'],function(){

Route::get('/logout',[FrontendPatientController::class,'logout'])->name('patient.logout');

//single patient profile
Route::get('/view-profile',[FrontendPatientController::class,'viewProfile'])->name('view.profile');
//cancle appointment from patient profile
Route::get('/appointment-cancel/{id}',[FrontendPatientController::class,'cancelAppointment'])->name('frontend.appointment.cancel');

//Update Profile
Route::post('/update-profile/{profileId}',[FrontendPatientController::class,'updateProfile'])->name('update.profile');

//Edit profile

Route::get('/edit-profile/{profileId}',[FrontendPatientController::class,'editProfile'])->name('edit.profile');

Route::post('/doctor-appointment/{doctor_id}',[AppointmentController::class,'appointment'])->name('book.appointment');

});



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
//accept appointment from appointment list
Route::get('/appointment-accept/{id}',[AppointmentlistController::class,'accept'])->name('appointment.accept');

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








