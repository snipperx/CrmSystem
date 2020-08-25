<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module_access extends Model
{
    protected $table = 'module_accesses';
    // Mass assignable fields
    protected $fillable = [
        'module_id', 'user_id', 'active', 'access_level'
    ];

    //Relationship modules and ribbons
    public function ribbons() {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
