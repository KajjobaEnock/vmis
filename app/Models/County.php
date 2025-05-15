<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class County extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [ 
        'name',
        'status',
        'district_id',
        'details',
    ];

    //Relationship between County and District
    public function district(){
        return $this->belongsTo(District::class);
    }
}
