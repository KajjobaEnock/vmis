<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SubCounty extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [ 
        'name',
        'status',
        'county_id',
        'details',
    ];

    //Relationship between Subcounty and County
    public function county(){
        return $this->belongsTo(County::class);
    }
}
