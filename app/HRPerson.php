<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HRPerson extends Model
{
    public $table = 'hr_people';

    // Mass assignable fields
    protected $fillable = [
        'user_id','first_name', 'surname', 'middle_name', 'maiden_name', 'aka', 'initial', 'email', 'cell_number',
        'phone_number', 'id_number', 'date_of_birth', 'passport_number', 'drivers_licence_number', 'drivers_licence_code',
        'proof_drive_permit', 'proof_drive_permit_exp_date', 'drivers_licence_exp_date', 'gender', 'own_transport', 'marital_status',
        'ethnicity', 'profile_pic', 'status','division_level_1', 'division_level_2', 'division_level_3',
        'division_level_4', 'division_level_5', 'leave_profile', 'manager_id','date_joined','date_left','role_id','position',

    ];


    //Relationship hr_person and user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }


    //Full Name accessor
    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->surname;
    }


    //Full Profile picture url accessor
    public function getProfilePicUrlAttribute() {
        $m_silhouette = Storage::disk('local')->url('avatars/m-silhouette.jpg');
        $f_silhouette = Storage::disk('local')->url('avatars/f-silhouette.jpg');
        return (!empty($this->profile_pic)) ? Storage::disk('local')->url("avatars/$this->profile_pic") : (($this->gender === 0) ? $f_silhouette : $m_silhouette);
    }

    //function to get people from a specific div level
    public static function peopleFronDivLvl($whereField, $divValue, $incInactive) {
        return HRPerson::where($whereField, $divValue)
            ->where(function ($query) use($incInactive) {
                if ($incInactive == -1) {
                    $query->where('status', 1);
                }
            })->get()
            ->sortBy('full_name')
            ->pluck('id', 'full_name');

    }
}
