<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->isStudent())
        {
            return redirect('intern/student');
        }

        if($user->isInternAdmin())
        {
            return redirect('intern/admin');
        }

        if($user->isSupervisor())
        {
            return redirect('intern/supervisor');
        }

        if($user->isAlumAdmin())
        {
            return redirect('alum/admin');
        }

        return redirect('/');
//        return view('home');
    }
}
