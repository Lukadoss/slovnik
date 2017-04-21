<?php

namespace App;

class Part_of_speech extends Model
{

    protected $fillable = [
        'part_of_speech'
    ];

    public function term(){
        return $this->hasMany(Term::class);
    }

    public function verb(){
        return $this->hasMany(Verb::class);
    }

    public function noun(){
        return $this->hasMany(Noun::class);
    }
}
