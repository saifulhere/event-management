<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        // if (!$user->hasVerifiedEmail()) {
        //     $user->sendEmailVerificationNotification();
        //     Auth::logout();

        //     return redirect()->route('verification.notice')
        //         ->with('warning', 'You need to verify your email first. We have sent you another verification email.');
        // }

        $userType = $user->user_type;

        if ($userType === 'admin' || $userType === 'manager') {
            if (!$user->hasVerifiedEmail()) {
                $user->sendEmailVerificationNotification();
                Auth::logout();

                return redirect()->route('verification.notice')
                    ->with('warning', 'You need to verify your email first. We have sent you another verification email.');
            }
        }
    }

    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('Auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $sanitizedEmail     = strip_tags($request->email);
        $sanitizedPassword  = strip_tags($request->password);

        $credentials    = [
            'email'     => $sanitizedEmail,
            'password'  => $sanitizedPassword
        ];

        if (auth()->attempt($credentials)) 
        {
            $user = Auth::user();
            $userType = $user->user_type;

            if ($userType === 'admin' || $userType === 'manager') {
                if (!$user->email_verified_at === null) {
                    Auth::logout();
                    return redirect()->route('verification.notice')
                        ->with('warning', 'You need to verify your email first. We have sent you another verification email.');
                }
            }
            elseif ($userType === 'user'){
                Auth::logout();
                return redirect()->route('login')
                        ->with('warning', 'You are not an admin. Please logged in as user.');
            }

            return redirect()->route('dashboard');
        } 
        else 
        {
            return redirect()->back()->with('status', 'Invalid login details!');
        }

    }
}
