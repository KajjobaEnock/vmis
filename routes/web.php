<?php

use App\Http\Controllers\CountyController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\ExCombatantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimitlessController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SubCountyController;
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

            Route::prefix('localization')->group(function(){
                Route::resource('regions', RegionController::class);
                Route::resource('districts', DistrictController::class);
                Route::resource('counties', CountyController::class);
                Route::resource('subcounties', SubCountyController::class);
                Route::resource('parishes', ParishController::class);
            });

            //Route::resource('ranks', RankController::class);
            Route::get('ranks',[RegionController::class,'ranks'])->name('ranks');
            Route::resource('brigades', BrigadeController::class);
            Route::resource('army_units', ArmyUnitController::class);
        });
    });
});
