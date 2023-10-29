<?php

namespace App\Http\Controllers\EventManager;

use App\Http\Controllers\Controller;
use App\Models\BookEvent;
use Illuminate\Http\Request;

class EventParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index ()
    {
        $participants   = BookEvent::paginate(10);

        return view('Admin.EventManager.Participants.all-participants', compact('participants'));
    }
}
