<?php

// use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\TimingController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RequestController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PharmacyController;

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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('backend.dashboard');


// Department display
Route::get('/backend/departments/display', [DepartmentController::class, 'display'])->name('departments.display');

// Phamacies display
Route::get('/backend/pharmacies/display', [PharmacyController::class, 'display'])->name('pharmacies.display');

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

});

// Doctor Area Routes
Route::group(['middleware' => ['auth', 'role:doctor'], 'prefix' => 'backend'], function () {
    // TIMING ROUTES
    Route::resource('timings', TimingController::class);

});


Route::middleware(['auth'])->group(function () {
    Route::resource('requests', RequestController::class);
});

 // PROFILE ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


require __DIR__.'/auth.php';
