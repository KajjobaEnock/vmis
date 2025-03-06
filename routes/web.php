<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\ExCombatantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimitlessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeteranController;
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
    return view('auth.login-master');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('{any}',[LimitlessController::class,'index'])->name('index');

    Route::prefix('veterans')->group(function(){
        Route::resource('ex-combatants', ExCombatantController::class);
        Route::resource('veterans', VeteranController::class);
    });

    //Administrator Routes
    Route::prefix('admin')->group(function(){

        Route::prefix('settings')->group(function(){
            Route::resource('users', UserController::class);
            Route::resource('districts', EmployeeController::class);
        });
    });
});
