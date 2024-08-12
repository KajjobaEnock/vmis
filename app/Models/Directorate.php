<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Directorate extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'directorates';

    protected $fillable = [
        'name',
        'position_id',
        'details',
        'status',
    ];

    /**
     * Get the Departments for the Directorate.
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    //Relationship between Directorate and Directorate Head
    public function position(){
        return $this->belongsTo(Position::class);
    }
}
