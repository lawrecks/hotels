<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static $SA = 1; //Super Admin
    public static $A = 2; //Admin
    public static $U = 3; //User
    public static $CC = 4; //Customer Care

    protected $fillable = ['name'];

    public function users(){
        $this->hasMany(User::class,'role_id');
    }
}
