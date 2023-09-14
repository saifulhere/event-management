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
        // $organizer = Organizer::latest()->first();
        $events      = Event::with('features', 'organizer')->get();
        return view('Frontend.index', compact('hero', 'about',  'events'));
    }

    public function showEvent ($id)
    {
        $event      = Event::with('organizer')->find($id);
        return view('Frontend.event', compact('event'));
    }
}
