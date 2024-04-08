<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\TimingController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PharmacyController;
use App\Http\Controllers\Backend\BecomedoctorController;
use App\Http\Controllers\Backend\AppointmentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('backend.dashboard');


//chat
Route::get('/backend/chat/index', [ChatController::class, 'index'])->name('chat.index');


// Department display
Route::get('/backend/departments/display', [DepartmentController::class, 'display'])->name('departments.display');

// Phamacies display
Route::get('/backend/pharmacies/display', [PharmacyController::class, 'display'])->name('pharmacies.display');

// Become a Doctor
Route::middleware('auth')->group(function () {
Route::get('/backend/becomedoctors/display', [BecomeDoctorController::class, 'display'])->name('becomedoctors.display');
Route::get('/backend/becomedoctors/usercreate', [BecomeDoctorController::class, 'usercreate'])->name('becomedoctors.usercreate');
Route::post('/backend/becomedoctors/userstore', [BecomeDoctorController::class, 'userstore'])->name('becomedoctors.userstore');
Route::get('/backend/becomedoctors/{id}/useredit', [BecomeDoctorController::class, 'useredit'])->name('becomedoctors.useredit');
Route::put('/backend/becomedoctors/{id}/userupdate', [BecomedoctorController::class, 'userupdate'])->name('becomedoctors.userupdate');
Route::get('/backend/becomedoctors/{id}/usershow', [BecomedoctorController::class, 'usershow'])->name('becomedoctors.usershow');
});
 
// Appoinment 
Route::middleware('auth')->group(function () {
Route::get('/backend/appointments/viewdoctor/{department}', [AppointmentController::class, 'viewdoctor'])->name('appointments.viewdoctor');
Route::get('/backend/appointments/doctorbio/{doctor}', [AppointmentController::class, 'doctorBio'])->name('appointments.doctorbio');
Route::get('/user/appointments/user', [AppointmentController::class, 'userindex'])->name('appointments.userindex');
Route::get('/backend/appointments/create/{doctor}', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/backend/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
Route::post('/backend/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
Route::get('/backend/users/{user}/appointments/{appointment}', [AppointmentController::class, 'usershow'])->name('appointments.usershow');

});

// Admin Area Routes
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'backend'], function () {

    // DEPARTMENT ROUTES
    Route::resource('departments', DepartmentController::class)->except(['display']);

    // DOCTOR ROUTES
    Route::resource('doctors', DoctorController::class);

    // USER ROUTES
    Route::resource('users', UserController::class);

    // PHARMACIES ROUTES
    Route::resource('pharmacies', PharmacyController::class)->except(["display"]);

    // BECOMEDOCTOR ROUTES
    Route::resource('becomedoctors', BecomedoctorController::class);

    // TIMING ROUTES
    Route::resource('timings', TimingController::class);
    Route::get('/backend/timings/adminindex', [TimingController::class, 'adminindex'])->name('timings.adminindex');

    // APPOINTMENT ROUTES
    Route::get('/backend/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/show/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');


});

// Doctor Area Routes
Route::group(['middleware' => ['auth', 'role:doctor'], 'prefix' => 'backend'], function () {
    
    //APPOINTMENT ROUTES
    
    Route::get('/backend/doctors/{doctor}/appointments/{appointment}', [AppointmentController::class, 'doctorshow'])->name('appointments.doctorshow');
    Route::get('/backend/appointments/doctor', [AppointmentController::class, 'doctorindex'])->name('appointments.doctorindex');
});


 // PROFILE ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


//For both admin and doctor.
Route::group(['middleware' => ['auth', 'role:doctor|admin'], 'prefix' => 'backend'], function () {

    // TIMING ROUTES
    Route::resource('timings', TimingController::class)->except("adminindex");

    //APPOINMENT ROUTES
    Route::post('/backend/appointments/{appointment}/accept', [AppointmentController::class, 'accept'])->name('appointments.accept');
    Route::post('/backend/appointments/{appointment}/reject', [AppointmentController::class, 'reject'])->name('appointments.reject');
    Route::post('/backend/appointments/{appointment}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');
});



require __DIR__.'/auth.php';
