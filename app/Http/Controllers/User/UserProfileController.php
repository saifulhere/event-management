<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user   = auth()->user();
        return view('User.profile', compact('user'));
    }

    public function edit()
    {
        $user   = auth()->user();
        return view('User.edit-profile', compact('user'));
    }
}
