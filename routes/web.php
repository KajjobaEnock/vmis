<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeProfileController;
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
            Route::controller(EmployeeController::class)->group(function(){
                Route::get('/', 'index')->name('employees.index');
                Route::get('create', 'create')->name('employees.create');
                Route::post('store', 'store')->name('employees.store');
                Route::post('store-employee', 'storeEmployee')->name('store.employee');
                Route::get('{id}/add-identification', 'getIdentification')->name('employees.identity');
                Route::post('/{id}/store-identification', 'storeIdentification')->name('store.identity');
                Route::get('/{id}/add-employment', 'getEmployment')->name('employees.employment');
                Route::post('/{id}/store-employment', 'storeEmployment')->name('store.employment');
                Route::get('/{id}/edit-employment', 'editEmployment')->name('edit.employment');
                Route::post('/{id}/update-employment', 'updateEmployment')->name('update.employment');
                Route::post('/{id}/update-employment-contract', 'addContract')->name('update.employment_contract');
                Route::get('/{id}/edit-address', 'editAddress')->name('employees.address');
                Route::post('update-current-village', 'save_current_village')->name('save_current_village');
                Route::post('/{id}/update-address', 'updateAddress')->name('update.address');
                Route::get('/{id}/edit-family-details', 'getFamilyDetails')->name('employees.family');
                Route::post('/{id}/update-family-details', 'updateFamilyDetails')->name('update.family');
                Route::get('/{id}/edit-education-background', 'getEducationBackground')->name('employees.education');
                Route::post('/{id}/update-education-background', 'storeEducationBackground')->name('update.education');
                Route::get('/{id}/add-employment-history', 'getEmploymentHistory')->name('employees.employment_history');
                Route::post('/{id}/update-employment-history', 'storeEmploymentHistory')->name('update.employment_history');
                Route::get('/{id}/preview-biodat', 'previewBiodata')->name('employees.preview_biodata');
                Route::get('/{id}/show', 'show')->name('employees.show');
                Route::get('/{id}/edit', 'edit')->name('employees.edit');
                Route::post('/{id}/update', 'update')->name('employees.update');
            });

            Route::controller(EmployeeProfileController::class)->group(function(){
                Route::post('update-employee-first-name', 'saveFirstName')->name('save_employee_first_name');
                Route::post('update-employee-last-name', 'saveLastName')->name('save_employee_last_name');
                Route::post('update-employee-middle-name', 'saveMiddleName')->name('save_employee_middle_name');
                Route::post('update-employee-gender', 'saveGender')->name('save_employee_gender');
                Route::post('update-employee-marital-status', 'saveMaritalStatus')->name('save_employee_marital_status');
                Route::post('update-employee-dob', 'saveDob')->name('save_employee_dob');
                Route::post('update-employee-nationality', 'saveNationality')->name('save_employee_nationality');
                Route::post('update-employee-office-number', 'saveOfficeNumber')->name('save_employee_office_number');
                Route::post('update-employee-email', 'saveEmail')->name('save_employee_email');
                Route::post('update-employee-mobile-number', 'saveMobileNumber')->name('save_employee_mobile_number');
                Route::post('update-employee-personal-email', 'savePersonalEmail')->name('save_employee_personal_email');
                Route::post('update-employee-nin', 'saveNin')->name('save_employee_nin');
                Route::post('update-employee-nssf-number', 'saveNssfNumber')->name('save_employee_nssf_number');
                Route::post('update-employee-insurance-number', 'saveInsuranceNumber')->name('save_employee_insurance_number');
                Route::post('update-employee-tin', 'saveTinNumber')->name('save_employee_tin');
                Route::post('update-employee-passport-number', 'savePassportNumber')->name('save_employee_passport_number');
            });

            
        });
    });
});
