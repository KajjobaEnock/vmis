<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class District extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [ 
        'name',
        'status',
        'region_id',
        'details',
    ];

    //Relationship between District and Region
    public function region(){
        return $this->belongsTo(Region::class);
    }
}
