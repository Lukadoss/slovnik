<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    public $timestamps = false;
    protected $guarded = ['id', 'is_admin'];
    protected $casts = [
        'is_admin' => 'boolean',
    ];
}
