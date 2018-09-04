<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    //A bear(model) is owned by a user
//    public function user (){
//        return $this->belongsTo('App/User');
//    }
}
