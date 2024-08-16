<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Project extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'code',
        'type',
        'status',
        'start_date',
        'end_date',
        'details',
    ];

    //Creating Relationship between the Project and Employee Model
    public function employee(){
        return $this->hasMany(User::class);
    }

    //Creating Relationship between the Project and the Budget Holder
    public function users(){
        return $this->belongsToMany(User::class);
    }

    //Creating Relationship between the Project and JobRequisitionProject Model
    public function jobRequisitionProject(){
        return $this->hasMany(JobRequisitionProject::class);
    }

    //Relationship between Project and ContractProject model
    public function contractProject(){
        return $this->hasMany(ContractProject::class);
    }
}
