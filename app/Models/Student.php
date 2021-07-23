<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'age',
        'address',
        'contained_in',
        'date_enrolled',
        'gender',
        'user_id'
    ];

    public function container() {
        return $this->belongsTo('App\Models\Student', 'contained_in', 'id');
    }
}
