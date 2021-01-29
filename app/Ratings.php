<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo(User_guest::class, 'user_id');
    }
}
