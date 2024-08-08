<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];
}
