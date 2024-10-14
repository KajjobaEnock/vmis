<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Sibling extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'siblings';

    protected $fillable = [
        'user_id',
        'full_name',
        'relationship',
        'detials',
    ];

    //Relationship between Siblings and User Model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
