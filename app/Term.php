<?php

namespace App;

class Term extends Model
{
    protected $casts = [
        'accepted' => 'boolean',
    ];

    public function isAccepted(){
        if($this->accepted)
            return true;
        return false;
    }

    public function part_of_speech(){
        return $this->belongsTo(Part_of_speech::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
