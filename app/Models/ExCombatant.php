<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ExCombatant extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'code',
        'rank_id',
        'claimant_name',
        'nin',
        'village',
        'parish',
        'sub_county_id',
        'amount',
        'account_name',
        'account_number',
        'bank',
        'telephone',
        'living_status',
        'file_status',
        'remarks',
        'father_name',
        'created_by',
        'modified_by',
        'reviewed_by',
        'reviewed_at'
    ];

    //Relationship between ExCombatants and Parish model
    public function parish(){
        return $this->belongsTo(Parish::class);
    }

    //Relationship Between ExCombatants and Rank
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
}
