<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'lastname',
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
        'updated_at',
        'created_at'
    ];
}