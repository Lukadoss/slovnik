<?php

namespace App;

class District_administration extends Model
{
    protected $table = 'district_administration';

    protected $fillable = [
        'user_id', 'district_id'
    ];
}
