<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\newPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArticlesController extends Controller
{
    public function indices (){
        return view('indices');
    }
    public function store (newPostRequest $request){
//        $input = Request::all();
        $input = Input::all();
//        $newArray = [];
//        $count=0;
//        foreach ($input as $key => $inputs){
//            array_push($newArray,$inputs);
//            $newArray[$key] = $key;
//            $newArray[$count] = $key;
//            $count++;

//        }
        dump($input);
        return response() ->json($input);
    }
    public function trial ($id=null) {
//        $data = Hotel::where('city', '=', 'mile12')->get();
        $data = Hotel::find($id);

//        $var = collect($data)->toArray();
//        dd(empty($var));
//        dump($var);
//        dump($data);
//        unset($var['username']);
//        dd($var);
        return $data;
    }
}
