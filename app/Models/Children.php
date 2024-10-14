<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Children extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'childrens';

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'status',
        'dob',
        'detials',
    ];

    //Relationship between Children and User Model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
