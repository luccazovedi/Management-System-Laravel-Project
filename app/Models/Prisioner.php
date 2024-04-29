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
        'age', 
        'gender',
        'date_entry',
        'date_out',
        'cell',
        'crime',
        'updated_at',
        'created_at'
    ];
}
