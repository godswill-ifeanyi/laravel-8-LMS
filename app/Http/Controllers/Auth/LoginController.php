<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated() {
        if (Auth::user()->role_as == "1") {
            return redirect('/admin/dashboard')->with('status', 'Welcome Admin');
        } else if (Auth::user()->role_as == "2" && Auth::user()->status == "1") {
            return redirect('/instructor/dashboard')->with('status', 'Logged In Successfully');
        } else if (Auth::user()->role_as == "3" && Auth::user()->status == "1") {
            return redirect('/home')->with('status', 'Logged In Successfully');
        } else if (Auth::user()->role_as == "2" && Auth::user()->status == "0") {
            return redirect('/')->with('status', 'You Have Been Locked Out By An Admin');
        } else if (Auth::user()->role_as == "3" && Auth::user()->status == "0") {
            return redirect('/')->with('status', 'You Have Been Locked Out By An Admin');
        } else {
            return redirect('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
