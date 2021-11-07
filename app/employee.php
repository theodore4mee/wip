<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'first_name',
        'last_name',
        'contact',
        'dob',
        'email',
        'street_address',
        'city_address',
        'postal_code_address',
        'country_address',
    ];
}
