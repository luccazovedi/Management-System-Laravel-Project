<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prisioner extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'lastname',
        'document',
        'age', 
        'cell',
        'gender',
        'zipcode',
        'address',
        'number',
        'city',
        'state',
        'country',
        'date_entry',
        'date_out',
        'crime',
        'observation',
        'updated_at',
        'created_at'
    ];
}
