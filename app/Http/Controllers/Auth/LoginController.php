<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showSignInPage(){
        return view('auth.signin');
    }

    public function login(Request $request){
        $validationRules['email'] = 'required';
        $validationRules['password'] = 'required';
        $request->validate($validationRules);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            if(Auth::user()->hasRole(['Admin'])){
                $toUrl = '/admin/home';
            }
            elseif(Auth::user()->hasRole(['Manager'])){
                $toUrl = '/manager/home';
            }
            elseif(Auth::user()->hasRole(['Customer'])){
                $toUrl = '/customer/home';
            }
            return redirect($toUrl);
        }
        return redirect()->back();
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
