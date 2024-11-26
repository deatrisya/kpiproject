<?php

use App\Http\Controllers\MachineController;
use App\Http\Controllers\UnitMachineController;
use Illuminate\Support\Facades\Route;

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
    return view('app');
});

Route::resource('units', UnitMachineController::class);
Route::post('/unit-data', [UnitMachineController::class,'data']);
Route::resource('machines',MachineController::class);
Route::post('/machine-data',[MachineController::class, 'data']);
