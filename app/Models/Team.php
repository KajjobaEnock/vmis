<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Team extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'teams';

    protected $fillable = [
        'name',
        'details',
        'status',
    ];

    /**
     * Get the Positions for the Team.
     */
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
