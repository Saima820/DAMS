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
use App\Http\Controllers\TimeslotController;



use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\DoctorController as FrontendDoctorController;
use App\Http\Controllers\Frontend\PatientController as FrontendPatientController;
use App\Http\Controllers\Frontend\DepartmentController as FrontendDepartmentController;
use App\Http\Controllers\Frontend\PaymentController as FrontendPaymentController;
use Illuminate\Support\Facades\Route;



//for website
Route::group(['middleware'=>'changeLanguageMiddleware'],function(){
Route::get('/',[FrontendHomeController::class,'home'])->name('home');
Route::get('/change/lang/{lang_name}',[FrontendHomeController::class,'changeLang'])->name('change.lang');

//all doctors
Route::get('/all-doctors',[FrontendDoctorController::class,'allDoctor'])->name('frontend.alldoctors');

//patient registration,login
Route::post('/registration',[FrontendPatientController::class,'registration'])->name('patient.registration');
Route::post('/do-login',[FrontendPatientController::class,'patientLogin'])->name('patient.login');


//Single doctor view
Route::get('/view-profile/{doctorID}',[FrontendDoctorController::class,'viewProfile'])->name('view.docprofile');


//Specific Department
Route::get('/specific-department/{id}',[FrontendDepartmentController::class,'specificDepartment'])->name('specific.department');

//search
Route::get('/search',[FrontendDoctorController::class,'search'])->name('search');



Route::group(['middleware'=>'patientAuth'],function(){

Route::get('/logout',[FrontendPatientController::class,'logout'])->name('patient.logout');

//single patient profile view
Route::get('/view-Patientprofile',[FrontendPatientController::class,'viewProfile'])->name('view.profile');
//view prescription
Route::get('/view-myprescription/{id}',[FrontendPatientController::class,'viewmyPrescription'])->name('view.myPrescription');
//cancle appointment from patient profile
Route::get('/appointment-cancel/{id}',[FrontendPatientController::class,'cancelAppointment'])->name('frontend.appointment.cancel');

//update button in a patient profile
Route::post('/update-profile/{profileId}',[FrontendPatientController::class,'updateProfile'])->name('update.profile');


//Edit profile in a single patient profile
Route::get('/edit-profile',[FrontendPatientController::class,'editProfile'])->name('edit.profile');
//book doctor appointment
Route::post('/book-appointment/{doctor_id}',[AppointmentController::class,'appointment'])->name('book.appointment');
//for payment
Route::post('/success', [FrontendPaymentController::class, 'success']);

});







// SSLCOMMERZ Start
Route::get('/example1', [PaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [PaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [PaymentController::class, 'index']);
Route::post('/pay-via-ajax', [PaymentController::class, 'payViaAjax']);


Route::post('/fail', [PaymentController::class, 'fail']);
Route::post('/cancel', [PaymentController::class, 'cancel']);

Route::post('/ipn', [PaymentController::class, 'ipn']);
//SSLCOMMERZ END


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
//view patient from backend
Route::get('/patient-view/{id}',[PatientlistController::class,'viewPatient'])->name('patient.view');


//Doctor List
Route::get('/doctor-list',[DoctorlistController::class,'doctorlist'])->name('doctor.list');
Route::get('/doctor-form',[DoctorlistController::class,'form'])->name('doctor.form');
Route::post('/doctor-store',[DoctorlistController::class,'store'])->name('doctor.store');
//view doctor from backend
Route::get('/doctor/view/{doc_id}',[DoctorlistController::class,'viewDoctor'])->name('doctor.view');
//delete doctor from backend
Route::get('/delete-profile/{id}',[DoctorlistController::class,'deleteProfile'])->name('doctor.delete');

//edit doctor from backend
Route::get('/edit-doctor/{id}',[DoctorlistController::class,'editDoctor'])->name('doctor.edit');
//update doctor from backend
Route::post('/update-doctor/{id}',[DoctorlistController::class,'updateDoctor'])->name('doctor.update');



//Appointment List
Route::get('/appointmentlist',[AppointmentlistController::class,'appointmentlist'])->name('appointment.list');

//accept appointment from appointment list
Route::get('/appointment-accept/{id}',[AppointmentlistController::class,'accept'])->name('appointment.accept');
//reject appointment from appointment list
Route::get('/appointment-reject/{id}',[AppointmentlistController::class,'reject'])->name('appointment.reject');
//add prescription button in appointmentlist
Route::get('/add-prescription/{prescriptionid}',[AppointmentlistController::class,'addPrescription'])->name('prescription.add');
//view prescription button in appointmentlist
Route::post('/create-prescription/{id}',[AppointmentlistController::class,'createPrescription'])->name('prescription.create');

Route::get('/appointment-form',[AppointmentlistController::class,'form'])->name('appointment.form');
Route::post('/appointment-store',[AppointmentlistController::class,'store'])->name('appointment.store');

//Time Slot
Route::get('/time-slot',[TimeslotController::class,'timeslot'])->name('time.slot');
Route::get('/time-slot-form',[TimeslotController::class,'timeslotform'])->name('time-slot.form');
Route::post('/time-slot-store',[TimeslotController::class,'timeslotstore'])->name('time-slot.store');
//time-slot delete
Route::get('/delete-timeslot/{id}',[TimeslotController::class,'deleteTimeslot'])->name('delete.timeslot');

//Payment List
Route::get('/payment',[PaymentController::class,'payment'])->name('payment.gateway');
Route::get('/payment-form',[PaymentController::class,'form'])->name('payment.form');
Route::post('/payment-store',[PaymentController::class,'store'])->name('payment.store');



//Department List
Route::get('/department',[DepartmentController::class,'department'])->name('department.list');
Route::get('/department-form',[DepartmentController::class,'form'])->name('department.form');
Route::post('/department-store',[DepartmentController::class,'store'])->name('department.store');
//department delete
Route::get('/delete-depaertment/{id}',[DepartmentController::class,'deleteDepartment'])->name('delete.department');

//Prescription List
Route::get('/prescription',[PrescriptionController::class,'prescription'])->name('prescription.list');
Route::get('/prescription/view/{id}',[PrescriptionController::class,'viewPrescription'])->name('prescription.view');
Route::get('/prescription-form',[PrescriptionController::class,'form'])->name('prescription.form');
Route::post('/prescription-store',[PrescriptionController::class,'store'])->name('prescription.store');

//Report
Route::get('/report',[AppointmentlistController::class,'report'])->name('appointment.report');

Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');




});

});








