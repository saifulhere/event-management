<?php

namespace App\Http\Controllers\EventManager;

use App\Http\Controllers\Controller;
use App\Models\EventGuest;
use App\Models\Organizer;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user       = auth()->user();
        $organizer  = Organizer::where('user_id', $user->id)->first();
        $guests     = EventGuest::with('events')->where('organizer_id', $organizer->id)->paginate(10);

        return view('Admin.EventManager.EventGuest.all-guests', compact('guests'));
    }

    public function create ()
    {
        $user       = auth()->user();
        $events     = Event::where('user_id', $user->id)->get();
        return view('Admin.EventManager.EventGuest.add-guest', compact('events'));
    }

    public function store (Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'designation'   => 'required',
            'about'         => 'required',
        ]);

        $user       = auth()->user();
        $organizer  = Organizer::where('user_id', $user->id)->first();

        $guest = EventGuest::create([
            'event_id'      => $request->event_id,
            'organizer_id'  => $organizer->id,
            'name'          => strip_tags($request->name),
            'designation'   => strip_tags($request->designation),
            'about'         => strip_tags($request->about),
        ]);

        if ($request->hasFile('profile')){

            $request->validate([
                'profile'  => 'image|mimes:png,jpg,webp',
            ]);

            $file       = $request->file('profile');
            $file_name  = time() . $file->getClientOriginalName();

            $image      = Image::make($file);
            $expectedWidth      = 300;
            $expectedHeight     = 350;

            $actualWidth        = $image->width();
            $actualHeight       = $image->height();

            if ($actualWidth !== $expectedWidth || $actualHeight !== $expectedHeight) 
            {
                return redirect()->back()
                                ->withErrors("The image dimensions should be {$expectedWidth}x{$expectedHeight} pixels.");
            }

            $file->storeAs('public', $file_name);
            $guest->update();
        }
    }

    public function edit (Request $request, $id)
    {
        $guest = EventGuest::with('event')->find($id);
        return view('Admin.EventManager.EventGuest.edit-guest', compact('guest'));
    }

    public function update (Request $request, $id)
    {
        $guest      = EventGuest::find($id);

        if ($request->hasFile('profile'))
        {
            $request->validate([
                'profile'   => 'image|mimes:png,jpg,webp'
            ]);

            if ($guest->profile)
            {
                $filePath   = 'public/' . $guest->profile;
                if(Storage::exists($filePath))
                {
                    Storage::delete($filePath);
                }
            }

            $file       = $request->file('profile');
            $file_name  = time() . $file->getClientOriginalName();

            $image      = Image::make($file);
            $expectedWidth      = 300;
            $expectedHeight     = 350;

            $actualWidth        = $image->width();
            $actualHeight       = $image->height();

            if ($actualWidth !== $expectedWidth || $actualHeight !== $expectedHeight) 
            {
                return redirect()->back()
                                ->withErrors("The image dimensions should be {$expectedWidth}x{$expectedHeight} pixels.");
            }

            $file->storeAs('public', $file_name);
            $guest->update();
        }

        $guest->event_id    = $request->event_id;
        $guest->name        = strip_tags($request->name);
        $guest->designation = strip_tags($request->designation);
        $guest->about       = strip_tags($request->about);
        $update = $guest->update();
        
        if ($update)
        {
            return redirect()->back()->with('success', 'Guest Profile updated successfully!');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }
    }

    public function destroy (Request $request, $id)
    {
        $guest  = EventGuest::find($id);
        if ($guest->profile)
        {
            $filePath   = 'public/' . $guest->profile;
            if(Storage::exists($filePath))
            {
                Storage::delete($filePath);
            }
        }
        $delete = $guest->delete();

        if ($delete)
        {
            return redirect()->back()->with('delete', 'Guest Profile deleted successfully!');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }
    }

}
