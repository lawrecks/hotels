<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Notifiable;
    protected $guard = 'admin';

    protected $fillable = [
        'username',
        'phone_no',
        'email',
        'city',
        'bank_name',
        'account_no',
        'account_name'
    ];
    public function bears (){
        return $this->belongsTo('App/User');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
