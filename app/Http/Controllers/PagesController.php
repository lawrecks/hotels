<?php

namespace App\Http\Controllers;

use App\Bear;
use App\Grand_user;
use App\Http\Requests\newPostRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request as Request;
class PagesController extends Controller
{
    public function about() {
//       $data = [];
//       $data['first'] = 'Leo';       //Can be done this way also, in the about view,'first' will be called as
                                        //a variable same with 'last'
//       $data['last'] = 'Lawrecks';
//
//        return view('about', $data);
        $name = 'Lawrecks';
        return view ('about')->with('name',$name);
    }
    public function reValue (){
        $value = [
            'title' => 'First Table',
            'body' =>  'Lorem Ipsum',
        ];
        $store = new Bear();
        $store ->fill($value);
        $store ->save();
    }
//    public function index(){
//        $bear = Bear::all();
//        return $bear;
//    }
}
