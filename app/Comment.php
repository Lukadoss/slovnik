<?php

namespace App;

class Comment extends Model
{

    protected $dates = ['created_at'];

    protected $fillable = [
        'text', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
