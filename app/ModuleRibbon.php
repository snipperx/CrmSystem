<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ModuleRibbon extends Model
{

    protected $table = 'module_ribbons';
    // Mass assignable fields
    protected $fillable = [
        'module_id', 'sort_order', 'ribbon_name', 'ribbon_path', 'description', 'access_level', 'active',
    ];

    public function ribbons()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    	//Relationship ribbon and access
    public function ribbonAccess() {
        return $this->hasone(ribbons_access::class, 'ribbon_id');
    }
	
	    //Function to save ribbon access
    public function addRibbonAccess(ribbons_access $module) {
        return $this->ribbonAccess()->save($module);
    }
}
