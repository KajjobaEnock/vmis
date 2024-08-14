<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'avatar',
        'employee_number',
        'nin',
        'line_manager_id',
        'status',
        'employee_type_id',
        'tin',
        'nssf_number',
        'joining_date',
        'contract_end_date',
        'office_number',
        'mobile_number',
        'amount',
        'languages',
        'skills',
        'email',
        'username',
        'position_id',
        'department_id',
        'project_id',
        'location_id',
        'marital_status_id',
        'nationality',
        'created_by',
        'modified_by',
        'password',
        'disability',
        'diability_details',
        'personal_email',
        'passport_number',
        'insurance_number',
        'illness',
        'illness_details',
        'profile_status',
        'profile_date',
        'personal_status',
        'address_status',
        'family_status',
        'education_status',
        'employment_status',
        'others_status',
        'appraisal_type',
        'current_village',
        'current_town',
        'current_district',
        'permanent_village',
        'permanent_subcounty',
        'permanent_county',
        'permanent_district',
        'spouse_name',
        'spouse_phone',
        'spouse_attachment',
        'spouse_details',
        'next_name',
        'next_phone',
        'next_address',
        'next_relationship',
        'next_details',
        'father_name',
        'father_status',
        'father_phone',
        'father_address',
        'father_details',
        'mother_name',
        'mother_status',
        'mother_phone',
        'mother_address',
        'mother_details',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    //Returns the Full name Attribute
    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    //Check if the user is activated
    public function isActivated(){
        if($this->status == 1){
            return true;
        }
        //return $this->status == 1;
    }

    /**
     * scope a query to include only active users
     */
    public function scopeActive(Builder $query):void
    {
        $query->where('status', 1);
    }

    //Get Active Users
    public static function getActiveStaff(){
        $actives = User::where('status', 1)->get();
        return $actives;
    }

    //Get Active Users
    public static function getInactiveStaff(){
        $in_actives = User::where('status', 0)->get();
        return $in_actives;
    }

    //Return Period Worked in years
    public function getWorkDurationAttribute(){
        $joiningDate = Carbon::parse($this->joining_date);
        $duration = today()->floatDiffInYears($joiningDate);
        return number_format($duration, 1);
    }

    //Return Employee Birthdays in the current Month
    public static function currentMonthBirthday()
    {
        $birthdays = User::select('first_name', 'middle_name', 'last_name', 'dob', 'profile_picture')
            ->whereMonth("dob = ?", [date('m')])
            ->where('status', 1)
            ->orderBy('dob', 'asc')->get();
        return $birthdays;
    }

    //Return Employees whose Birthday is today
    public static function getTodayBirthdays()
    {
        $birthdays = User::select('first_name', 'middle_name', 'last_name', 'dob', 'profile_picture')
            ->whereDay('dob', [date('d')])
            ->whereMonth('dob', [date('m')])
            ->where('status', 1)
            ->orderBy('dob', 'asc')->get();
        return $birthdays;
    }

    /**
     * The attributes that should be included when searching the model.
     *
     * @var array
     */
    protected $searchableAttributes = [
        'first_name',
        'last_name',
        'email',
        'employee_number',
        'mobile_number',
        'joining_date',
    ];

    /**
     * The relations and their attributes that should be included when searching the model.
     *
     * @var array
     */
    protected $searchableRelations = [
        'staff'    => ['first_name', 'last_name', 'employee_number', 'email'],
        'line_manager'    => ['first_name', 'last_name', 'employee_number', 'email'],
        'department' => ['name'],
        'location'     => ['name'],
        'position'    => ['name'],
        'employee_type'    => ['name'],
        'marital_status'    => ['name'],
    ];

    //Creating Relationship between the Employees and their line managers
    public function staff(){
        return $this->hasMany(User::class, 'line_manager_id', 'id');
    }

    //Creating Relationship between the line manager and their staff
    public function line_manager(){
        return $this->belongsTo(User::class, 'line_manager_id', 'id');
    }

    //Creating Relationship between employee and Department model
    public function department(){
        return $this->belongsTo(Department::class);
    }

    //Creating Relationship between employee and Location model
    public function location(){
        return $this->belongsTo(Location::class);
    }

    //Creating Relationship between employee and Position model
    public function position(){
        return $this->belongsTo(Position::class);
    }

    //Creating Relationship between employee and Project model
    public function project(){
        return $this->belongsTo(Project::class);
    }

    //Relationship between Employee and Employee Type Model
    public function employeeType(){
        return $this->belongsTo(EmployeeType::class);
    }

    //Relationship between Employee and Marital Status Model
    public function maritalStatus(){
        return $this->belongsTo(MaritalStatus::class);
    }
}
