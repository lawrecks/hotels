<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HotelsController extends Controller
{
    public function index () {
        return  view ('hotels/hotels');
    }

    public function sign_up () {
        return  view ('hotels/sign_up');
    }

    public function log_in () {
        return  view ('hotels/log_in');
    }

    public function dashboard () {
        if (Auth::guest()){
            return redirect('hotels/log_in');
        }
        else{
            return  view ('hotels/dashboard');
            }
    }


    public function create_user () {
        if (Auth::guest()){
            return redirect('hotels/log_in');
        }else
        return  view ('hotels/create_user')->with(compact('data'));
    }

    public function doCreate () {
        $rules = [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
        $data = Input::all();
        $validator=Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput(Input::except('password', 'confirmPassword'))
                ->withErrors($validator);
        } else {
            $user = User::create([
                'username' => $data['username'],
                'phone_no' => $data['phone'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'confirm_password' => bcrypt($data['confirm_password']),
                'city' => $data['city'],
                'bank_name' => $data['bank'],
                'account_no' => $data['account'],
                'account_name' => $data['accountname'],
                'role_id' => $data['role_id']
            ]);
            $user->save();
            session()->flash('flash_message','User created successfully');
            session()->flash('flash_message_close',true);
            return redirect('hotels/dashboard');
        }
    }

    public function add_role(){
      if (Auth::guest()){
        return redirect('hotels/log_in');
    }else
        return  view ('hotels/add_role');
    }

    public function doAdd ()
    {
        $rules = [
            'name' => 'required|max:255|unique:roles'
        ];
        $data = Input::all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput(Input::except('password', 'confirm_password'))
                ->withErrors($validator);
        } else {
            $role = Role::create([
                'name' => $data['name']
            ]);
            $role->save();
            session()->flash('flash_message', 'Role created successfully');
            session()->flash('flash_message_close', true);
            return redirect('hotels/dashboard');
        }
    }

    public function change_role($id,$value){
//        dd();
        User::where('id', $id)->update(['role_id' => $value ]);
        return back();
    }

    public function strip_admin($id){
//        dd();
        User::where('id', $id)->update(['role_id' => 0]);
        return back();
    }

    public function delete ($id) {
        User::where('id', $id)->delete();
        return back();
    }

    public function del_role ($id) {
        Role::where('id', $id)->delete();
        return back();
    }
}
