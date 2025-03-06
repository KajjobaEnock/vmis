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
        'gender',
        'avatar',
        'email',
        'username',
        'status',
        'mobile_number',
        'created_by',
        'modified_by',
        'password',
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

    /**
     * scope a query to include only active users
     */
    public function scopeActive(Builder $query):void
    {
        $query->where('status', 1);
    }

    /**
     * scope a query to include only Inactive users
     */
    public function scopeInactive(Builder $query):void
    {
        $query->where('status', 0);
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
}
