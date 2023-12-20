<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function checkLogin(Request $request)
    // {

    //     $input=$request->all();

    //     $this->validate($request,[
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $remember_me = $request->has('remember_me') ? true : false;

    //     if (auth()->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me))
    //     {
    //         if(auth()->user()->role=='admin')
    //         {
    //             return redirect() -> route('admins.dashboard');

    //         }else{
    //             return redirect() -> route('admin.login');

    //         }
    //     }
    //     return redirect()->back()->with(['error' => 'error logging in']);
    // }
}
