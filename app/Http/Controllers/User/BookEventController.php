<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use ILluminate\Support\Facades\Auth;
use App\Models\User;


class BookEventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function store(Request $request)
    {
        //'user_id', 'age', 'passing_year', 'quantity', 'payment_status', 'image'
        $request->validate([
            'age'           => 'required|numeric',
            'passing_year'  => 'required|numeric',
            'quantity'      => 'required|numeric',
            'image'         => 'image|mimes:jpg,png,webp|max:3072'
        ]);

        $sanitizedAge           = strip_tags($request->age);
        $sanitizedPassingYear   = strip_tags($request->passing_year);
        $sanitizedQuantity      = strip_tags($request->quantity);
        
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();

        $image = Image::make($file);
        $expectedWidth = 300; 
        $expectedHeight = 350;
        $actualWidth = $image->width(); 
        $actualHeight = $image->height();

        if ($actualWidth !== $expectedWidth || $actualHeight !== $expectedHeight) {
            return redirect()
                ->back()
                ->withErrors("The image dimensions should be {$expectedWidth}x{$expectedHeight} pixels.");
        }
        $file->storeAs('public', $file_name);

        BookEvent::create([
            'user_id'       => auth()->user()->id,
            'age'           => $sanitizedAge,
            'passing_year'  => $sanitizedPassingYear,
            'qantity'       => $sanitizedQuantity,
            'payment_status'=> 'pending',
            'image'         => $file_name
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
