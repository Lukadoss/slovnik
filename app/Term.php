<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $casts = [
        'accepted' => 'boolean',
    ];

    public function meanings(){
        return $this->hasMany(Meaning::class);
    }

    public function isAccepted(){
        if($this->accepted)
            return true;
        return false;
    }
}