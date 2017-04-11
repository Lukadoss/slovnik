<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    public function getAdmins(){
        return $this->belongsToMany(User::class, 'district_administration', 'district_id', 'user_id');
    }
}
