<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimitlessController;
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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('{any}',[LimitlessController::class,'index'])->name('index');

    //Administrator Routes
    Route::prefix('admin')->group(function(){
        //Organisation Management Routes
        Route::prefix('organisation-management')->group(function(){
            Route::resource('directorates', 'App\Http\Controllers\DirectorateController');
            Route::resource('departments', 'App\Http\Controllers\DepartmentController');
            Route::resource('positions', 'App\Http\Controllers\PositionController');
            Route::resource('teams', 'App\Http\Controllers\TeamController');
            Route::resource('locations', 'App\Http\Controllers\LocationController');
            Route::resource('bands', 'App\Http\Controllers\BandController');
            Route::resource('categorization-ones', 'App\Http\Controllers\CategorizationOneController');
            Route::resource('categorization-twos', 'App\Http\Controllers\CategorizationTwoController');

        });

        //Employee Management Routes
        Route::prefix('employees')->group(function(){
            Route::resource('employee-types', 'App\Http\Controllers\EmployeeTypeController');
        });
    });
});
