<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meaning extends Model
{

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
