<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Department extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'departments';

    protected $fillable = [
        'name',
        'directorate_id',
        'position_id',
        'status',
        'details',
    ];

    //Creating relationship between the Department model and the Directorate Model
    public function directorate(){
        return $this->belongsTo(Directorate::class);
    }

    //Creating Relationship between the Department and Employee Model
    public function employee(){
        return $this->hasMany(User::class);
    }

    //Creating Relationship between the Department and User Model
    public function users(){
        return $this->hasMany(User::class);
    }

    //Creating relationship between the Department and Position Model
    public function position(){
        return $this->belongsTo(Position::class);
    }
}
