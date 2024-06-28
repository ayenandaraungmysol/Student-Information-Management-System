<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
   // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectToAdmin = RouteServiceProvider::ADMIN;//admin route
    protected $redirectToTeacher = RouteServiceProvider::TEACHER;//teacher route

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Where to redirect based on user role.
     *
     * @param $user
     * @return route
     */
    protected function authenticated(Request $request, $user)
    {
        // Check user role and redirect accordingly
        if ($user->role->role_name === 'Admin') {
            return redirect()->intended($this->redirectToAdmin);
        } else {
            return redirect()->intended($this->redirectToTeacher);
        }
    }
}
