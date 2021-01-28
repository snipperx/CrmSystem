<?php

namespace App;

use Hashids\Hashids;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable, HasRoles;

    protected $appends = ['hashid'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function person()
    {
        return $this->hasOne(HRPerson::class, 'user_id');
    }


    public function addPerson($person)
    {
        return $this->person()->save($person);
    }

    public function getHashidAttribute()
    {
        return Module::hashids()->encode($this->attributes['id']);
    }

    public function googleAccounts()
    {
        return $this->hasMany(GoogleAccount::class);
    }
}
