<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'full_name' => 'required',
        //     'username'  => 'required|unique:users,username',
        //     'status'    => 'required',
        //     'user_type' => 'required',
        //     'email'     => 'required|unique:users, email',
        //     'phone'     => 'required',
        //     'password'  => 'required|confirmed|mix:6'
        // ]);

        $user = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
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
