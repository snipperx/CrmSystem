<?php

namespace App;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class HRPositions extends Model
{

    protected $appends = ['hashid'];
    
    public $table = 'hr_positions';

    // Mass assignable fields
    protected $fillable = [
        'name','description','status'
    ];


    public function persons(){
        return $this->belongsTo(HRPerson::class, 'position');
    }

    public function getHashidAttribute()
    {
        return Module::hashids()->encode($this->attributes['id']);
    }
}
