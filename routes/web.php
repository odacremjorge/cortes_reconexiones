<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RemesaController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/operator', [OperatorController::class, 'index']);
Route::resource('operator',OperatorController::class)->names('operator');
Route::get('/operator/{id}/edit', [App\Http\Controllers\OperatorController::class, 'edit'])->name('operator.editar');
Route::get('/remesa', [RemesaController::class, 'index']);
Route::resource('remesa',RemesaController::class)->names('remesa');
Route::get('/remesa/{id}/edit', [App\Http\Controllers\RemesaController::class, 'edit'])->name('remesa.editar');
Route::get('/job', [JobController::class, 'index']);
Route::resource('job',JobController::class)->names('job');
Route::get('/job/{id}/edit', [App\Http\Controllers\JobController::class, 'edit'])->name('job.editar');
Route::get('/report', [ReportController::class, 'index']);
Route::get('/show', [ReportController::class, 'show']);
Route::get('/report/showPDF', [ReportController::class, 'showPDF']);