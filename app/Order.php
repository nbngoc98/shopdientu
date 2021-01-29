<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function users()
    {
        return $this->belongsTo(User_guest::class, 'user_id');
    }
}
