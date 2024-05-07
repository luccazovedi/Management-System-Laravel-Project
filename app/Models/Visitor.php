<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'document',
        'age',
        'phone',
        'email',
        'address',
        'number',
        'city',
        'zipcode',
        'state',
        'country',
        'gender',
        'visit_date',
        'visit_time',
        'prisioner_id'
    ];

    public function prisioner()
    {
        return $this->belongsTo(Prisioner::class);
    }
}
