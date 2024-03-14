<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\TimingController;

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

Route::get('/backend/departments/display', [DepartmentController::class, 'display'])->name('departments.display');

// Admin Area Routes
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'backend'], function () {

    // DEPARTMENT ROUTES
    Route::resource('departments', DepartmentController::class)->except(['display']);

    // DOCTOR ROUTES
    Route::resource('doctors', DoctorController::class);

});

// Doctor Area Routes
Route::group(['middleware' => ['auth', 'role:doctor'], 'prefix' => 'backend'], function () {
    // TIMING ROUTES
    Route::resource('timings', TimingController::class);

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
