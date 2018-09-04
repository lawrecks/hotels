<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected $redirectTo = 'hotels/hotels';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
//    public function store()
//    {
//        return view('auth.login');
//    }
    public function log_in () {
        return view('hotels.log_in');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doLogin() {
        $data = Input::all();
//        dd($data, bcrypt($data['password']));
        if (empty($data['email'])||empty($data['password'])) {
            session()->flash('flash_message_error', 'Please provide both email address and password' );
            return redirect('hotels/log_in');
        }
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            Auth::user();
            $user = Auth::user();
            $data=$user;
                return redirect('hotels/dashboard')->with(compact('users','data'));
        }
        else{
//            $errormsg = 'You are not registered here';
//            return $errormsg;
            session()->flash('flash_message_error', 'Email address or password is incorrect!' );

            return redirect()->back();
        }
//        $user=Hotel::where('email', '=', $data['email'])->where ('password', '=', bcrypt($data['password']))->first();
//       if ($user == null) {
////            $user = Auth::user();
//           return 'error';
//        } else {
//           return 'you are logged in';
//       }
    }
    public function logout()
    {
        $user = Auth::user();
//        $user->save();
        Auth::logout();
        return redirect('hotels');
    }

}

