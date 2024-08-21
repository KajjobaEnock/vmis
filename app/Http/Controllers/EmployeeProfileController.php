<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
    //Save First Name
    public function saveFirstName(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->first_name = $request->first_name;
        $employee->save();
    }

    //Save Last Name
    public function saveLastName(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->last_name = $request->last_name;
        $employee->save();
    }

    //Save Middle Name
    public function saveMiddleName(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->middle_name = $request->middle_name;
        $employee->save();
    }

    //Save Date of Birth
    public function saveDob(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->dob = $request->dob;
        $employee->save();
    }

    //Save Marital Status
    public function saveMaritalStatus(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->marital_status = $request->marital_status;
        $employee->save();
    }

    //Save Gender
    public function saveGender(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->gener = $request->gender;
        $employee->save();
    }

    //Save Marital Status
    public function saveNationality(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->nationality = $request->nationality;
        $employee->save();
    }

    //Save Office Number
    public function saveOfficeNumber(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->office_number = $request->office_number;
        $employee->save();
    }

    //Save Email
    public function saveEmail(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->email = $request->email;
        $employee->save();
    }

    //Save Mobile Number
    public function saveMobileNumber(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->mobile_number = $request->mobile_number;
        $employee->save();
    }

    //Save Personal
    public function savePersonalEmail(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->personal_email = $request->personal_email;
        $employee->save();
    }

    //Save NIN
    public function saveNin(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->nin = $request->nin;
        $employee->save();
    }

    //Save NSSF Number
    public function saveNssfNumber(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->nssf_number = $request->nssf_number;
        $employee->save();
    }

    //Save Insurance Number
    public function saveInsuranceNumber(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->insurance_number = $request->insurance_number;
        $employee->save();
    }

    //Save Tin Number
    public function saveTinNumber(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->tin = $request->tin;
        $employee->save();
    }

    //Save Passport Number
    public function savePassportNumber(Request $request){
        $employee = User::findOrFail($request->employeeId);
        $employee->passport_number = $request->passport_number;
        $employee->save();
    }
}
