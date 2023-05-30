<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
