<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    protected $fillable = [
        'name', 'email', 'password'
    ];


    protected $hidden = [
        'password', 'is_admin'
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function getRole(){
        if($this->is_admin){
            return "Administrátor";
        }else{
            return "Registrovaný uživatel";
        }
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function districtAdmin(){
        return $this->belongsToMany(Districts::class, 'district_administration', 'user_id', 'district_id');
    }
}
