<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DivisiController;

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


Route::get('/employee-list', function () {
    return view('employee-list');
});

// Route::get('/score-data', function(){
//     return view('kpi.score_data');
// });



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
    // Route::get('group-data', [TaskController::class,'group_data'])->name('goals.group');
    // Route::post('grade', [TaskController::class,'grade'])->name('goals.grade');
    // Route::post('mark', [TaskController::class,'mark'])->name('goals.mark');
    Route::post('update_adm', [TaskController::class, 'update_adm'])->name('goals.update_adm');
    Route::post('progress', [TaskController::class, 'progress'])->name('goals.progress');
    Route::get('view_prog', [TaskController::class, 'view_prog'])->name('goals.view_prog');

    //employee
    Route::resource('employee', MemberController::class);
    Route::get('/profile', [MemberController::class, 'profile'])->name('employee.profile');
    Route::get('/employee/{id}/hapus', [MemberController::class, 'hapus'])->name('employee.hapus');

    //divisi
    Route::resource('divisi', DivisiController::class);
    Route::get('/divisi/{id}/hapus', [DivisiController::class, 'hapus'])->name('divisi.hapus');

    //Sales Reports
    Route::get('/reports', function () {
        return view('kpi.reports');
    });

    //Sales Reports
    Route::get('/progress', function () {
        return view('progress');
    });

    Route::resource('kpi', KPIController::class);
    Route::get('/kpi/{id}/hapus', [KPIController::class, 'hapus'])->name('kpi.hapus');

    //logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    //logout khusus jika eror (akses dari ketik url /logout)
    // Route::get('logout', [LoginController::class, 'logout'])->middleware('auth');
});
