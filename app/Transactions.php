<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User_guest::class,'user_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'id','transaction_id');
    }
}
