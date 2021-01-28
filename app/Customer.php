<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'customer';

    // Mass assignable fields
    protected $fillable = [
        'gender', 'address', 'city', 'postalCode', 'country'
    ];
}
