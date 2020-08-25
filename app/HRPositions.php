<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HRPositions extends Model
{
    public $table = 'hr_positions';

    // Mass assignable fields
    protected $fillable = [
        'name','description','status'
    ];
}
