<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Parish extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [ 
        'name',
        'status',
        'sub_county_id',
        'details',
    ];

    //Relationship between Subcounty and Parish
    public function sub_county(){
        return $this->belongsTo(SubCounty::class);
    }
}
