<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateEmployeePersonalRequest;
use App\Models\Department;
use App\Models\EmployeeType;
use App\Models\Language;
use App\Models\Location;
use App\Models\MaritalStatus;
use App\Models\Position;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.employees.employees_list',[
            'users' => User::active()->with('employeeType', 'position.band', 'department.directorate', 'line_manager', 'location')->get(),
            'title' => 'Employees',
            'subtitle' => 'Employees List'
        ]);
    }


    //Display a list of active Employees
    public function getActive(){
        return view('admin.employees.employees_list',[
            'users' => User::active()->with('employeeType', 'position.band', 'department.directorate', 'line_manager', 'location')->where('status', 1)->get(),
            'title' => 'Employees',
            'subtitle' => 'Employees List'
        ]);
    }

    //Display a list of Deactivated Employees
    public function getInactive(){
        return view('admin.employees.employees_list',[
            'users' => User::active()->with('employeeType', 'position.band', 'department.directorate', 'line_manager', 'location')->where('status', 0)->get(),
            'title' => 'Employees',
            'subtitle' => 'Employees List'
        ]);

    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.employees.forms.create.create', [
            'marital_statuses' => MaritalStatus::select(['id', 'name'])->get(),
            'skills' => Skill::select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        if ( $user = User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'nin' => $request->nin,
                'marital_status_id' => $request->marital_status,
                'employee_type_id' => $request->employee_type,
                'position_id' => $request->position_id,
                'line_manager_id' => $request->line_manager,
                'joining_date' => $request->joining_date,
                'contract_end_date' => $request->contract_end_date,
                'location_id' => $request->location,
                'office_number' => $request->office_number,
                'mobile_number' => $request->mobile_number,
                'languages' => $request->language,
                'skills' => $request->skills,
                'employee_number' => $request->employee_number,
                'tin' => $request->tin,
                'nssf_number' => $request->nssf_number,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'created_by' => Auth::id(),
            ])
        ){
            event(new Registered($user));
            return redirect()->route('employees.index')
                ->with('flash_message','Employee created successfully.');
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployee(StoreEmployeeRequest $request){
        if($user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'marital_status_id' => $request->marital_status,
            'office_number' => $request->office_number,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'personal_email' => $request->personal_email,
            'username' => $request->username,
            'personal_status' => 1,
            'password' => bcrypt('${1:my-secret-password'),
            'created_by' => Auth::id(),
        ])){
            return redirect()->route('employees.identity', $user->id)
                ->with('flash_message','Employee Personal Information created successfully, Please add the identification details.');
        }
    }

    //Function to get employee Identification details
    public function getIdentification($id){

        $employee = User::findOrFail($id);
        if($employee){
            return view('admin.employees.forms.create.identity', [
                'employee' => $employee,
                'languages' => Language::select(['id', 'name'])->get(),
                'skills' => Skill::select(['id', 'name'])->get(),
            ]);
        }
        else{
            abort('401');
        }
    }

    public function storeIdentification(StoreEmployeeIdentificationRequest $request, $id){

        $employee = User::findOrFail($id);
        if($employee){
            $employee->update([
                'nin' => $request->nin,
                'tin' => $request->tin,
                'nssf_number' => $request->nssf_number,
                'passport_number' => $request->passport_number,
                'insurance_number' => $request->insurance_number,
                'languages' => $request->language,
                'skills' => $request->skills,
            ]);
            return redirect()->route('employees.employment', $employee->id)
                ->with('flash_message','Employee Identification Information created successfully, Please add the Employement details.');
        }
        else{
            abort('401');
        }
    }

    /**
     *Function to add Employee Employment details
     */
    public function getEmployment($id){
        $employee = User::findOrFail($id);
        if($employee){

            return view('admin.employees.forms.create.employment', [
                'employee' => $employee,
                'departments' => Department::select(['id', 'name'])->get(),
                'line_managers' => User::select('id', 'first_name', 'middle_name', 'last_name')->get()->except(Auth::id()),
                'types' => EmployeeType::select(['id', 'name'])->get(),
                'positions' => Position::select(['id', 'name'])->get(),
                'locations' => Location::select(['id', 'name'])->get(),
                'projects' => Project::select(['id', 'name', 'code'])->get(),
                'appraisal_types' => AppraisalService::APPR_TYPE,
                'financial_year' => FinancialYear::where('status', 1)->first()
            ]);

        }else{
            abort('401');
        }
    }

    /**
     * Function to save the employee employment details
     */
    public function storeEmployment(StoreEmployeeEmployementRequest $request, $id){
        $employee = User::findOrFail($id);
        if($employee){
            $employee->update([
                'employee_number' => $request->employee_number,
                'employee_type_id' => $request->employee_type,
                'position_id' => $request->position_id,
                'department_id' => $request->department,
                'project_id' => $request->project,
                'line_manager_id' => $request->line_manager,
                'joining_date' => $request->joining_date,
                'contract_end_date' => $request->contract_end_date,
                'location_id' => $request->location,
                'appraisal_type' => $request->appraisal_type,
            ]);

            $appinstance = StaffAppraisalType::create([
                'staff_id' => $employee->id,
                'appraisal_type' => $request->appraisal_type,
                //'financial_year' => $request->financial_year,
                'financial_year' => 1,
                'status' => 1,

            ]);

            $contract = new Contract();
            $contract->user_id = $employee->id;
            $contract->start_date = Carbon::parse($request->joining_date);
            $contract->end_date = Carbon::parse($request->contract_end_date);
            $contract->position_id = $request->position_id;
            $contract->department_id = $request->department;
            $contract->project_id = $request->project;
            $contract->location_id = $request->location;
            $contract->save();

            event(new Registered($employee));

            return redirect()->route('employees.index')
                ->with('flash_message','Employee successfully created.');
        }else{
            abort('401');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //
        return view('admin.employees.employee', [
            'user' => User::findOrFail($user),
            'title' => 'Employees List'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        //
        return view('admin.employees.forms.edit.edit', [
            'employee' => User::findOrFail($user),
            // 'levels' => EmployeeLevel::select('id', 'name')->get(),
            'line_managers' => User::select('id', 'first_name', 'middle_name', 'last_name')->get(),
            'types' => EmployeeType::select(['id', 'name'])->get(),
            'languages' => Language::select(['id', 'name'])->get(),
            'marital_statuses' => MaritalStatus::select(['id', 'name'])->get(),
            'positions' => Position::select(['id', 'name'])->get(),
            'locations' => Location::select(['id', 'name'])->get(),
            'skills' => Skill::select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\updateEmployeePersonalRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(updateEmployeePersonalRequest $request, $user)
    {
        //
        $employee = User::findOrFail($user);
        if($employee){
            $employee->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'marital_status_id' => $request->marital_status,
                'office_number' => $request->office_number,
                'mobile_number' => $request->mobile_number,
                'email' => $request->email,
                'personal_email' => $request->personal_email,
                //'username' => $request->username,
                'nin' => $request->nin,
                'tin' => $request->tin,
                'nssf_number' => $request->nssf_number,
                'passport_number' => $request->passport_number,
                'insurance_number' => $request->insurance_number,
                'languages' => $request->language,
                'skills' => $request->skills,
                'personal_status' => 1,
                'modified_by' => Auth::id(),
            ]);

            return redirect()->route('edit.employment', $employee->id)
                ->with('flash_message','Employee Personal Information Update. You can now update the Employement Details as well.');

        }
        else{
            abort('401');
        }
    }

    //Function to save first name
    public function saveFirstName(Request $request){
        $employee = User::findOrFail($request->employee_id);
        dd($employee);
        $employee->first_name = $request->first_name;
        $employee->save();
    }

    /**
     *Function to edit Employee Employment details
     */
    public function editEmployment($id){
        $employee = User::findOrFail($id);
        if($employee){
            $contract = Contract::where('user_id', $id)->latest('created_at')->first();
            $departments = Department::select(['id', 'name'])->get();
            $line_managers = User::select('id', 'first_name', 'middle_name', 'last_name')->where('status', 1)->get()->except($employee->id);
            $types = EmployeeType::select(['id', 'name'])->get();
            $positions = Position::select(['id', 'name'])->get();
            $locations = Location::select(['id', 'name'])->get();
            $projects = Project::select(['id', 'name', 'code'])->get();
            if($contract){
                return view('admin.employees.forms.edit.employment', [
                    'departments' => $departments,
                    'line_managers' => $line_managers,
                    'types' => $types,
                    'positions' => $positions,
                    'locations' => $locations,
                    'projects' => $projects,
                    'contract' => $contract,
                    'employee' => $employee
                ]);
            }
            else{
                return view('admin.employees.forms.edit.add_contract', [
                    'employee' => $employee,
                    'departments' => $departments,
                    'line_managers' => $line_managers,
                    'types' => $types,
                    'positions' => $positions,
                    'locations' => $locations,
                    'projects' => $projects,

                ]);
            }

        }else{
            abort('401');
        }
    }

    /**
     * Function to save the employee employment details
     */
    public function updateEmployment(UpdateEmployementRequest $request, $id){
        $contract = Contract::findOrFail($id);
        $employee = User::findOrFail($contract->user_id);
        if($employee){

            $contract->update([
                'position_id' => $request->position,
                'department_id' => $request->department,
                'location_id' => $request->location,
                'contract_type' => $request->contract_type,
                'main_project' => $request->main_project,
                'line_manager_id' => $request->line_manager,
                'fte_categorization' => $request->fte_categorization,
                'fte_level' => $request->fte_level,
                'employee_primary_designation' => $request->employee_primary_designation,
                'current_allocation' => $request->current_allocation,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'modified_by' => Auth::id(),
            ]);

            $employee->update([
                'employee_number' => $request->employee_number,
                'employee_type_id' => $request->contract_type,
                'position_id' => $request->position,
                'department_id' => $request->department,
                'project_id' => $request->main_project,
                'line_manager_id' => $request->line_manager,
                'joining_date' => $request->joining_date,
                'contract_end_date' => $request->contract_end_date,
                'location_id' => $request->location,
                'employment_status' => 1,
            ]);

            return redirect()->route('employees.address', $employee->id)
                ->with('flash_message','Employement Details successfully Updated, you can now update the Address details.');
        }else{
            abort('401');
        }
    }

    /**
     * Function to save the employee employment details
     */
    public function addContract(UpdateEmployContractRequest $request, $id){
        $employee = User::findOrFail($id);
        if($employee){
            $employee->update([
                'employee_number' => $request->employee_number,
                'position_id' => $request->position,
                'department_id' => $request->department,
                'project_id' => $request->main_project,
                'line_manager_id' => $request->line_manager,
                'joining_date' => $request->joining_date,
                'contract_end_date' => $request->contract_end_date,
                'location_id' => $request->location,
                'employment_status' => 1,
            ]);

            $contract = Contract::create([
                'user_id' => $employee->id,
                'position_id' => $request->position,
                'department_id' => $request->department,
                'location_id' => $request->location,
                'contract_type' => $request->contract_type,
                'main_project' => $request->main_project,
                'line_manager_id' => $request->line_manager,
                'fte_categorization' => $request->fte_categorization,
                'fte_level' => $request->fte_level,
                'employee_primary_designation' => $request->employee_primary_designation,
                'current_allocation' => $request->current_allocation,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => 1,
                'created_by' => Auth::id(),
                'modified_by' => Auth::id(),
            ]);

            return redirect()->route('employees.address', $employee->id)
                ->with('flash_message','Employement & Contract Details successfully Updated, you can now update the Address details.');
        }else{
            abort('401');
        }
    }

    /**
     * Function to show and add/ edit Address Details
     */
    public function editAddress($id){
        $employee = User::findOrFail($id);
        if($employee){
            return view('admin.employees.forms.edit.address', [
                'employee' => $employee,
            ]);
        }
        else{
            abort('401');
        }
    }

    //Function to save current Village
    public function save_current_village(Request $request){

        $employee = User::findOrFail($request->employee_id);
        $employee->current_village = $request->current_village;
        $employee->save();
    }

    /**
     * Function to save Address
     */
    public function updateAddress(UpdateAddressRequest $request, $id){
        $employee = User::findOrFail($id);
        if($employee){

            $employee->update([

                'current_village' => request('current_village'),
                'current_town' => request('current_town'),
                'current_district' => request('current_district'),
                'permanent_village' => request('permanent_village'),
                'permanent_subcounty' => request('permanent_subcounty'),
                'permanent_county' => request('permanent_county'),
                'permanent_district' => request('permanent_district'),
            ]);

            return redirect()->route('employees.family', $employee->id)
                ->with('flash_message','Address Details successfully Updated, you can now update the Family details.');

        }
        else{
            abort('401');
        }
    }

    /**
     * Function to save current address
     */
    public function storeCurrentAddress($id){
        $employee = User::findOrFail($id);
        if($employee){

        }
        else{
            abort('401');
        }
    }

    /**
     * Function to update current address
     */
    public function updateCurrentAddress($id){
        $employee = User::findOrFail($id);
        if($employee){

        }
        else{
            abort('401');
        }
    }

    /**
     * Function to save permanent address
     */
    public function storePermanentAddress($id){
        $employee = User::findOrFail($id);
        if($employee){

        }
        else{
            abort('401');
        }
    }

    /**
     * Function to update permanent address
     */
    public function updatePermanentAddress($id){
        $employee = User::findOrFail($id);
        if($employee){

        }
        else{
            abort('401');
        }
    }

    /**
     * Function to show Family Details
     */
    public function getFamilyDetails($id){
        $employee = User::findOrFail($id);
        if($employee){
            return view('admin.employees.forms.edit.family', [
                'employee' => $employee,
                'kids' => Children::where('user_id', $employee->id)->get(),
                'siblings' => Sibling::where('user_id', $employee->id)->get(),
            ]);
        }
        else{
            abort('401');
        }
    }

    /**
     * Function to save Family Details
     */
    public function updateFamilyDetails(UpdateFamilyRequest $request, $id){
        $employee = User::findOrFail($id);
        if($employee){

            $employee->update([
                'family_status' => 1,

                'father_name' => request('father_full_name'),
                'father_phone' => request('father_phone_number'),
                'father_address' => request('father_physical_address'),
                'father_status' => request('father_status'),

                'mother_name' => request('mother_full_name'),
                'mother_phone' => request('mother_phone_number'),
                'mother_address' => request('mother_physical_address'),
                'mother_status' => request('mother_status'),
            ]) ;

            if($employee->marital_status_id == 1){
                $spouse = Spouse::where('user_id', $employee->id)->first();
                if(isset($request->full_name)){
                    $marriage_certificate =  $request->marriage_certificate->store('staff/marriage_certificate', 'public');
                    if($spouse !== null){
                        $spouse->update([
                            'user_id' => $employee->id,
                            'full_name' => request('full_name'),
                            'phone_number' => request('phone_number'),
                            'attachment' => $marriage_certificate,
                            'details' => request('details'),
                        ]);
                    }
                    else{
                        Spouse::Create([
                            'user_id' => $employee->id,
                            'full_name' => request('full_name'),
                            'phone_number' => request('phone_number'),
                            'attachment' => $marriage_certificate,
                            'details' => request('details'),
                        ]);
                    }
                }
            }

            $nextOfKin = NextOfKin::where('user_id', $employee->id)->first();
            if($nextOfKin !== null){
                $nextOfKin->update([
                    'user_id' => $employee->id,
                    'full_name' => request('next_full_name'),
                    'phone_number' => request('next_phone_number'),
                    'physical_address' => request('next_physical_address'),
                    'relationship' => request('next_relationship'),
                ]);
            }
            else{
                NextOfKin::Create([
                    'user_id' => $employee->id,
                    'full_name' => request('next_full_name'),
                    'phone_number' => request('next_phone_number'),
                    'physical_address' => request('next_physical_address'),
                    'relationship' => request('next_relationship'),
                ]);
            }
            return redirect()->route('employees.education', $employee->id)
                ->with('flash_message','Family Details successfully Updated, you can now update the Education Background details.');

        }
        else{
            abort('401');
        }
    }

    /**
     * Function to show Education Background
     */
    public function getEducationBackground($id){
        $employee = User::findOrFail($id);
        if($employee){
            return view('admin.employees.forms.edit.education', [
                'employee' => $employee,
                'schools' => EducationBackground::where('user_id', $employee->id)->get(),
            ]);
        }
        else{
            abort('401');
        }
    }

    /**
     * Function to save Education Background
     */
    public function storeEducationBackground($id){
        $employee = User::findOrFail($id);
        if($employee){
            $employee->update([
                'education_status' => 1
            ]);

            return redirect()->route('employees.employment_history', $employee->id)
                ->with('flash_message','Education Background Details successfully Updated, you can now update the Employment History details.');
        }
        else{
            abort('401');
        }
    }

    /**
     * Function to show Employment History
     */
    public function getEmploymentHistory($id){
        $employee = User::findOrFail($id);
        if($employee){
            return view('admin.employees.forms.edit.employment_history', [
                'employee' => $employee,
                'employments' => EmploymentHistory::where('user_id', $employee->id)->get(),
            ]);

        }
        else{
            abort('401');
        }
    }

    /**
     * Function to save Employment History
     */
    public function storeEmploymentHistory($id){
        $employee = User::findOrFail($id);
        if($employee){
            $employee->update([
                'employment_status' => 1
            ]);

            return redirect()->route('employees.index',)
                ->with('flash_message','Employee Details have been successfully Updated!');
        }
        else{
            abort('401');
        }
    }

    /**
     * Function to Preview Employee Biodat form
     */
    public function previewBiodata($id){
        $employee = User::findOrFail($id);
        if($employee){

        }
        else{
            abort('401');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
