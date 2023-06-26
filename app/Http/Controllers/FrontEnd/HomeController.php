<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::find(1);
        return view('Frontend.index', compact('hero'));
    }
}
