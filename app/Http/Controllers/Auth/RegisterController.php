<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\newPostRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected $redirectTo = 'hotels.hotels';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'confirm_password' => 'required|same:password'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function sign_up () {
        return  view ('hotels/sign_up');
    }

    protected function create()
    {
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
//            $user = new User();
//            $user->fill($data);
//            $user->password = bcrypt(Input::get('password'));
//            $user->confirm_password = bcrypt(Input::get('confirm_password'));
//            dd($user);
//            $user->save();
//            session()->flash('flash_message', 'User created successfully.');
//            return redirect()->back();

            $user = User::create([
                'username' => $data['username'],
                'phone_no' => $data['phone'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'confirm_password' => bcrypt($data['confirm_password']),
                'city' => $data['city'],
                'bank_name' => $data['bank'],
                'account_no' => $data['account'],
                'account_name' => $data['accountname']
            ]);
    //            dd($user);
            $user->save();
            session()->flash('flash_message','Your account has been created successfully, please log in');
            session()->flash('flash_message_close',true);
            return redirect('hotels/log_in')->with(compact('data'));
            }
    }
}