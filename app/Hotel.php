<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'username',
        'phone_no',
        'email',
        'password',
        'city',
        'bank_name',
        'account_no',
        'account_name'
    ];
}
