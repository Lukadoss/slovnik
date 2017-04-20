<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password', 'year_of_birth', 'native', 'current_city'
    ];


    protected $hidden = [
        'password', 'auth_level'
    ];

    protected $guarded = [
        'password', 'auth_level'
    ];

    public function isAdmin()
    {
        return ($this->auth_level === 2);
    }

    public function getRole()
    {
        if ($this->auth_level === 2) {
            return "Administrátor";
        } elseif ($this->districtAdmin()->count() > 0) {
            return "Správce oblasti";
        } else {
            return "Registrovaný uživatel";
        }
    }

    public function getUserCities()
    {
        $cities = "";
        if ($this->districtAdmin()->count() > 0) {
            foreach ($this->districtAdmin as $district) {
                $cities === "" ? $cities = $district->municipality : $cities = $cities.", ".$district->municipality;
            }
        }
        return $cities;
    }

    public function getNativeCity()
    {
        return $this->belongsTo(District::class, 'native');
    }

    public function getCurrCity()
    {
        return $this->belongsTo(District::class, 'current_city');
    }

    public function meanings()
    {
        return $this->hasMany(Meaning::class)->take(5);
    }

    public function districtAdmin()
    {
        return $this->belongsToMany(District::class, 'district_administration', 'user_id', 'district_id');
    }
}
