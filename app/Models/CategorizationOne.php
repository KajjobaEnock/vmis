<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CategorizationOne extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'categorization_ones';

    protected $fillable = [
        'name',
        'details',
        'status',
    ];

    /**
     * Get the Positions for the CategorizationOne.
     */
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
