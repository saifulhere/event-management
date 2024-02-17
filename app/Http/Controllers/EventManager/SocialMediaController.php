<?php

namespace App\Http\Controllers\EventManager;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user       = auth()->user();
        $organizer = Organizer::where('user_id', $user->id)->first();

        if ($organizer){
            $socialMedia = SocialMedia::where('organizer_id', $organizer->id)->first();
        }else {
            return view('Admin.EventManager.Organizer.social-media');
        }

        return view('Admin.EventManager.Organizer.social-media', compact('socialMedia'));
    }

    public function store (Request $request)
    {
        $user       = auth()->user();
        $organizer  = Organizer::where('user_id', $user->id)->first();

        SocialMedia::create([
            'organizer_id'  => $organizer->id,
            'facebook'      => strip_tags($request->facebook),
            'instagram'     => strip_tags($request->instagram),
            'twitter'       => strip_tags($request->twitter),
            'linkedin'      => strip_tags($request->linkedin)
        ]);

        return redirect()->back()->with('success', 'Socia media are set successfully');
    }

    public function update (Request $request)
    {
        $user       = auth()->user();
        $organizer = Organizer::where('user_id', $user->id)->first();

        $socialMedia = SocialMedia::where('organizer_id', $organizer->id)->first();

        $socialMedia->facebook  = strip_tags($request->facebook);
        $socialMedia->instagram = strip_tags($request->instagram);
        $socialMedia->twitter   = strip_tags($request->twitter);
        $socialMedia->linkedin  = strip_tags($request->linkedin);

        $socialMedia->update();
        return redirect()->back()->with('success', 'Socia media are updated successfully');
    }
}
