<?php

namespace App;

class Meaning extends Model
{

    public function term()
    {
        return $this->belongsTo(Term::class);
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
