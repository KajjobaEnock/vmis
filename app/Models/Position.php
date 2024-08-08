<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Position extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'positions';

    protected $fillable = [
        'name',
        'details',
        'supervisor',
        'band_id',
        'team_id',
        'categorization_one_id',
        'categorization_two_id',
        'created_by',
        'modified_by',
    ];

    //Creating Relationship between the Position and Employee Model
    public function employee(){
        return $this->hasMany(User::class);
    }

    //Creating Relationship between the Position and their supervisor/line manager
    public function supervisee(){
        return $this->hasMany(Position::class, 'supervisor', 'id');
    }

    //Creating Relationship between the supervisor and their supervisees
    public function supervisor(){
        return $this->belongsTo(Position::class, 'supervisor', 'id');
    }

    //Relationship between the Position and Band
    public function band(){
        return $this->belongsTo(Band::class);
    }

    //Relationship between the Position and Team
    public function team(){
        return $this->belongsTo(Team::class);
    }

    //Relationship between the Position and Categorization One
    public function categorizationOne(){
        return $this->belongsTo(CategorizationOne::class);
    }

    //Relationship between the Position and Categorization One
    public function categorizationTwo(){
        return $this->belongsTo(CategorizationTwo::class);
    }

    //Relationship between the position and requisition
    public function requisition(){
        return $this->hasMany(JobRequisition::class);
    }
}
