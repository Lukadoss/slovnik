<?php

namespace App;

class Meaning extends Model
{

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
