<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

	protected function authenticated(Request $request, $user)
	{
		if($user->isStudent())
		{
			return view('intern.student.test');
		}

		if($user->isInternAdmin())
		{
			return view('intern.admin.test');
		}

		if($user->isSupervisor())
		{
			return view('intern.supervisor.test');
		}

		if($user->isAlumAdmin())
		{
			return view('alum.admin.test');
		}

		return redirect('/');
	}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
	    Auth::logout();
        $this->middleware('guest', ['except' => 'logout']);
    }
}
