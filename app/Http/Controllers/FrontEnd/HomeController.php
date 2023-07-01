<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::find(1);
        $about = About::with('features')->find(1);
        return view('Frontend.index', compact('hero', 'about'));
    }
}
