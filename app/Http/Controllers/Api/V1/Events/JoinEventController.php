<?php

namespace App\Http\Controllers\Api\V1\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\BookEvent;
use App\Models\User;
use App\Models\PaymentMethod;
use Intervention\Image\Facades\Image;

class JoinEventController extends Controller
{
    public function index(Event $event)
    {
        $payment_methods     = PaymentMethod::all();
        $events      = Event::with('features', 'organizer')->get();
        // return view('Frontend.index', compact('hero', 'about',  'events'));
        return response()->json($events);
        // return view('Frontend.book-event', compact('event', 'payment_methods'));
    }

    public function showEvent ($slug)
    {
        $event      = Event::with('organizer')->where('slug', $slug)->first();
        // $event      = Event::with('organizer')->find($slug);
        return view('Frontend.event', compact('event'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'number_of_people'  => 'required',
            'payment_method'=> 'required',
            'trxn_id'       => 'required',
            'payment_number'=> 'required',
        ]);
        
        $paymentStatus      = 'pending';

        $bookEvent = BookEvent::create([
            'event_id'      => $request->event_id,
            'guest_id'      => $request->guest_id,
            'name'          => strip_tags($request->name),
            'email'         => strip_tags($request->email),
            'phone'         => strip_tags($request->phone),
            'number_of_people'  => strip_tags($request->number_of_people),
            'payment_method'=> $request->payment_method,
            'trxn_id'       => strip_tags($request->trxn_id),
            'payment_number'=> strip_tags($request->payment_number),
            'payment_status'    => $paymentStatus,
        ]);

        if ($request->hasFile('image')){

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

            $bookEvent->image = $file_name;
            $bookEvent->update();
        };

        return redirect()->back()->with('status', 'Event booked successful');
    }

    public function bookedEvent()
    {
        $id     = auth()->user()->id;
        $user   = User::with('bookedEvent')->find($id);
        return view('User.booked-event', compact('user'));
    }
}
