<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Band extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'bands';

    protected $fillable = [
        'name',
        'grade',
        'details',
        'status',
    ];

    /**
     * Get the Positions for the Directorate.
     */
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
