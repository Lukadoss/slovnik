<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password'
    ];


    protected $hidden = [
        'password', 'is_admin'
    ];


    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
