<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    public function index()
    {
        return view('Auth.User.signup');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|unique:users,email',
            'phone'     => 'required',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'status'    => $request->status,
            'user_type' => 'user',
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
        ]);


        $credentials    = $request->only('email', 'password');

        if (auth()->attempt($credentials)) 
        {
            return redirect()->route('user.dashboard');
        } 
        else 
        {
            return redirect()->back()->with('status', 'Invalid login details!');
        }
    }
}
