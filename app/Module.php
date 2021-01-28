<?php

namespace App;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{


    protected $table = 'modules';

    protected $appends = ['hashid'];

    protected $fillable = [
        'name', 'path', 'active', 'font_awesome',
    ];

    public static function hashids()
    {
        return new Hashids();
    }

//Relationship module and ribbon
    public function moduleRibbon()
    {
        return $this->hasmany(ModuleRibbon::class, 'module_id');
    }

//Relationship module and access
    public function moduleAccess()
    {
        return $this->hasone(Module_access::class, 'module_id');
    }

//Function to save module's ribbon
    public function addRibbon(ModuleRibbon $ribbon)
    {
        return $this->moduleRibbon()->save($ribbon);
    }

//Function to save module access
    public function addModuleAccess(Module_access $module)
    {
        return $this->moduleAccess()->save($module);
    }

// Accesor to hash ids
    public function getHashidAttribute()
    {
        return  Module::hashids()->encode($this->attributes['id']);
    }


}
