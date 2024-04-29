<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
