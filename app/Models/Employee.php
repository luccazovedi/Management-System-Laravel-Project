<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'document',
        'email',
        'phone',
        'age',
        'gender',
        'zipcode',
        'address',
        'number',
        'city',
        'state',
        'country',
        'role',
        'other',
        'date_admission',
        'salary',
    ];
}
