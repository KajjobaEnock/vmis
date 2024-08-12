<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CategorizationTwo extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'categorization_twos';

    protected $fillable = [
        'name',
        'details',
        'status',
    ];

    /**
     * Get the Positions for the CategorizationTwo.
     */
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
