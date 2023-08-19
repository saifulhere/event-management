<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\About;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::find(1);
        $about = About::with('features')->find(1);
        $organizer = Organizer::latest()->first();
        $event      = Event::with('features')->latest()->first();
        return view('Frontend.index', compact('hero', 'about', 'organizer', 'event'));
    }
}
