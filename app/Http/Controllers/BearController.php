<?php

namespace App\Http\Controllers;

use App\Bear;
use Illuminate\Http\Request;

class BearController extends Controller
{
    public function reValue (){
        $value = [
            'title' => 'First Table',
            'body' =>  'Lorem Ipsum',
        ];
        $store = new Bear();
        $store ->fill($value);
        $store ->save();

    }
}
