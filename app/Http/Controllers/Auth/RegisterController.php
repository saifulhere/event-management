<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified', 'admin']);
    // }
    
    public function index()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'user_type' => 'required',
            'email'     => 'required|unique:users,email',
            'phone'     => 'required',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'status'    => $request->status,
            'user_type' => $request->user_type,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
        ]);

        $user->sendEmailVerificationNotification();
        return redirect()->route('verification.notice');
    }
}
