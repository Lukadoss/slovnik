<?php

namespace App;

class District extends Model
{
    public function getAdmins(){
        return $this->belongsToMany(User::class, 'district_administration', 'district_id', 'user_id');
    }
}
