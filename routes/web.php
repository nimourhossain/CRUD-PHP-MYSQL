<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Models\Patient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Display all patients on the home page
Route::get('/', function () {
    return view('welcome', ['patients' => Patient::paginate(3)]);
})->name('home');

// Show the create patient form
Route::get('/create', [PatientController::class, 'create'])->name('create');

// Store a new patient's information
Route::post('/store', [PatientController::class, 'ourfilestore'])->name('store');


Route::get('/edit/{id}', [PatientController::class, 'editData'])->name('edit');

Route::post('/update/{id}', [PatientController::class, 'updateData'])->name('update');


Route::get('/delete/{id}', [PatientController::class, 'deleteData'])->name('delete');