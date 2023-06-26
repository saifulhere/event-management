<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        return view('Admin.index');
    }

    public function event()
    {
        return view('Admin.Events.event');
    }
}
