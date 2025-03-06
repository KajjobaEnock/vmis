<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Veteran extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'entry_date',
        'date',
        'sub_county_id',
        'parish',
        'village',
        'army_unit_id',
        'brigade_id',
        'unit_id',
        'rank_id',
        'army_number',
        'certificate_number',
        'prd_disch',
        'batch',
        'created_by',
        'modified_by',
        'reviewed_by',
        'reviewed_at',
        'approved_by',
    ];

    //Relationship between Veterans and SubCounty model
    public function subCounty(){
        return $this->belongsTo(SubCounty::class);
    }

    //Relationship between Veterans and ArmyUnit
    public function armyUnit(){
        return $this->belongsTo(ArmyUnit::class);
    }
    
    //Relationship between Veterans and Brigade
    public function brigade(){
        return $this->belongsTo(Brigade::class);
    }

    //Relationship between Veterans and Unit
    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    //Relationship between Veterans and Rank
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
}
