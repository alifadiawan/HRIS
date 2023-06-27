<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-member/{kpiId}', [TaskController::class, 'get_member'])->name('api.goals.getMember');
// Route::post('/search-data', [TaskController::class, 'searchData'])->name('api.search.data');
// Route::get('/search-data/{member_id}', [TaskController::class, 'searchData'])->name('api.search.data');
Route::match(['post', 'get'], '/search-data/{member_id}', [TaskController::class, 'searchData'])->name('api.search.data');
// Route::match(['post','get'],'/search-data', [TaskController::class, 'searchData'])->name('api.search.data');
Route::post('/kpi/toggle-is-active', [KPIController::class, 'toggleIsActive'])->name('api.goals.toggleIsActive');
Route::match(['post','get'],'/ria/{id}', [DashboardController::class, 'ria'])->name('api.dashboard.ria');

