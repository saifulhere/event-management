<?php

namespace App\Http\Controllers\Auth\Verification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function index()
    {
        return view('Auth.Verification.verification');
    }

    public function store($id)
    {
        $user = User::findOrFail($id);

        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('dashboard');
    }
    public function resend(Request $request)
    {
        if($request->user()->hasVerifiedEmail()){
            return redirect()->route('dashboard');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
