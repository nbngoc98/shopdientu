<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User_guest extends Authenticatable
{
    use  Notifiable;

    protected $table = 'user_guests';

    protected $guarded = 'user_guests';

    protected $fillable = [
        'firstname','lastname', 'email', 'password','province_city','district','village','hamlet', 'phone',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
