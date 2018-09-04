<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'phone_no',
        'email',
        'password',
        'confirm_password',
        'city',
        'bank_name',
        'account_no',
        'account_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'confirm_password'
    ];
//    All users belong to a role(model)
    public function role (){
        return $this->belongsTo(Role::class,'role_id');
    }
}
