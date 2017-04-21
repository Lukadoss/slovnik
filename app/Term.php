<?php

namespace App;

class Term extends Model
{
    protected $casts = [
        'accepted' => 'boolean',
    ];

    public function meaning(){
        return $this->hasMany(Meaning::class);
    }

    public function pos(){
        return $this->belongsTo(Part_of_speech::class);
    }

    public function isAccepted(){
        if($this->accepted)
            return true;
        return false;
    }
}
