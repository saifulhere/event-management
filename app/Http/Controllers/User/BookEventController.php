<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use ILluminate\Support\Facades\Auth;
use App\Models\User;


class BookEventController extends Controller
{
    public function index(Event $event)
    {
        return view('Frontend.book-event', compact('event'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|numeric',
            'email'         => 'required',
            'number_of_people'  => 'required'
        ]);
        
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();

        $image          = Image::make($file);
        $expectedWidth  = 300;
        $expectedHeight = 350;
        $actualWidth    = $image->width(); 
        $actualHeight   = $image->height();

        if ($actualWidth !== $expectedWidth || $actualHeight !== $expectedHeight) {
            return redirect()
                ->back()
                ->withErrors("The image dimensions should be {$expectedWidth}x{$expectedHeight} pixels.");
        }
        $file->storeAs('public', $file_name);
        $paymentStatus      = 'pending';

        BookEvent::create([
            'event_id'      => $request->event_id,
            'guest_id'      => $request->guest_id,
            'name'          => strip_tags($request->name),
            'email'         => strip_tags($request->email),
            'phone'         => strip_tags($request->phone),
            'image'         => $file_name,
            'number_of_people'  => strip_tags($request->number_of_people),
            'payment_status'    => $paymentStatus,
        ]);

        return redirect()->back()->with('status', 'Event booked successful');
    }

    public function bookedEvent()
    {
        $id     = auth()->user()->id;
        $user   = User::with('bookedEvent')->find($id);
        return view('User.booked-event', compact('user'));
    }
}
