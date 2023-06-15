<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;

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


//redirect ke view login
Route::get('/', function () {
   return redirect('sign-in');
});



Route::get('group-data', function () {
    return view('kpi.groupdata');
});
Route::get('/score-data', function () {
    return view('kpi.score_data');
});



Route::middleware(['web', 'guest'])->group(function () {
    //login
    Route::get('sign-in', [LoginController::class, 'index'])->name('sign-in');
    Route::post('sign-in', [LoginController::class, 'authenticate']);

    //register
    Route::get('sign-up', [RegisterController::class, 'index']);
    Route::post('sign-up', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {

    //dashboard
    Route::resource('dashboard', DashboardController::class);

    //Goals Team
    Route::resource('goals', TaskController::class);
   
    //Input Item Data 
    Route::get('/input', function () {
        return view('kpi.input');
    });

    //Sales Reports
    Route::get('/reports', function () {
        return view('kpi.reports');
    });



    //logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    //logout khusus jika eror (akses dari ketik url /logout)
    // Route::get('logout', [LoginController::class, 'logout'])->middleware('auth');
});
