<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Location extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'locations';

    protected $fillable = [
        'name',
        'status',
        'details',
    ];

    //Creating Relationship between the Location and Employee Model
    public function employee(){
        return $this->hasMany(User::class);
    }
}
