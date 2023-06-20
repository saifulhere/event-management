<?php

namespace App\Http\Controllers\Auth\Passwords;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {
        return view('Auth.Password.forget');
    }
}
