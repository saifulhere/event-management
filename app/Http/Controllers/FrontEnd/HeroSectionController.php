<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Hero;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;


class HeroSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $hero = Hero::latest()->first();
        $organizer = Organizer::latest()->first();
        return view('Admin.Events.event', compact('hero', 'organizer'));
    }

    public function store(Request $request)
    {
        $hero = new Hero;

        if ($request->hasFile('bg_image')) {

            $request->validate([
                'bg_image' => 'image|mimes:jpg,png,webp', // Adjust the validation rules as needed
            ]);

            $file = $request->file('bg_image');
            $file_name = time() . $file->getClientOriginalName();

            $image = Image::make($file);
            $expectedWidth = 1600; 
            $expectedHeight = 600;
            $actualWidth = $image->width(); 
            $actualHeight = $image->height();

            if ($actualWidth !== $expectedWidth || $actualHeight !== $expectedHeight) {
                return redirect()
                    ->back()
                    ->withErrors("The image dimensions should be {$expectedWidth}x{$expectedHeight} pixels.");
            }

            // Store the file in the storage directory
            $file->storeAs('public', $file_name);

            // Save the file name in the database (assuming 'Hero' model)
            $hero->bg_image = $file_name;
        }

        Hero::create([
            'sub_heading'   => $request->sub_heading,
            'heading'       => $request->heading,
            'btn_url'       => $request->btn_url
        ]);

        return redirect()->back()->with('status', 'Event Set Successfully');
    }

    public function update(Request $request)
    {
        $hero = Hero::find(1);

        $hero->sub_heading  = $request->sub_heading;
        $hero->heading      = $request->heading;
        $hero->btn_url      = $request->btn_url;

        if ($request->hasFile('bg_image')) {
            // Validate the uploaded file
            $request->validate([
                'bg_image' => 'image|mimes:jpg,png,webp', // Adjust the validation rules as needed
            ]);
    
            if ($hero->bg_image) {
                $filePath = 'public/' . $hero->bg_image;
            
                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
            }
    
            // Retrieve the uploaded file
            $file = $request->file('bg_image');
            $file_name = time() . $file->getClientOriginalName();
    
            // Perform additional validation on the image dimensions (optional)
            $image = Image::make($file);
            $expectedWidth = 1600;
            $expectedHeight = 600;
            $actualWidth = $image->width();
            $actualHeight = $image->height();
    
            if ($actualWidth !== $expectedWidth || $actualHeight !== $expectedHeight) {
                return redirect()
                    ->back()
                    ->withErrors("The image dimensions should be {$expectedWidth}x{$expectedHeight} pixels.");
            }
    
            // Store the file in the storage directory
            $file->storeAs('public', $file_name);
    
            // Update the file name in the database
            $hero->bg_image = $file_name;
            $hero->save();
        }

        $hero->update();

        return redirect()->back()->with('status', 'Event Updated Successfully');
    }

    //ORGANIZER INFORMATION
    public function organizerInfo (Request $request)
    {
        $request->validate([
            'organizer_name'    => 'required',
            'about_organizer'   => 'required',
            'organizer_phone'   => 'required',
            'organizer_email'   => 'required'
        ]);

        $sanitizedOrganization  = strip_tags($request->organizer_name);
        $sanitizedTagline       = strip_tags($request->organizer_tagline);
        $sanitizedAbout         = strip_tags($request->about_organizer);
        $sanitizedPhone         = strip_tags($request->organizer_phone);
        $sanitizedEmail         = strip_tags($request->organizer_email);

        Organizer::create([
            'organizer_name'    => $sanitizedOrganization,
            'tag_line'          => $sanitizedTagline,
            'about_organizer'   => $sanitizedAbout,
            'phone'             => $sanitizedPhone,
            'email'             => $sanitizedEmail
        ]);

        return redirect()->back()->with('success', 'Organizer Info saved successful');
    }

    public function organizerUpdate (Request $request)
    {
        $request->validate([
            'organizer_name'    => 'required',
            'about_organizer'   => 'required',
            'organizer_phone'   => 'required',
            'organizer_email'   => 'required'
        ]);

        $sanitizedOrganization  = strip_tags($request->organizer_name);
        $sanitizedTagline       = strip_tags($request->organizer_tagline);
        $sanitizedAbout         = strip_tags($request->about_organizer);
        $sanitizedPhone         = strip_tags($request->organizer_phone);
        $sanitizedEmail         = strip_tags($request->organizer_email);

        $organizer              = Organizer::latest()->first();

        $organizer->organizer_name  = $sanitizedOrganization;
        $organizer->tag_line        = $sanitizedTagline;
        $organizer->about_organizer = $sanitizedAbout;
        $organizer->phone           = $sanitizedPhone;
        $organizer->email           = $sanitizedEmail;

        $update = $organizer->update();

        if ( $update )
        {
            return redirect()->back()->with('success', 'Organizer info updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong!');
        }
    }

    //EVENT INFORMATION
    public function event (Request $request)
    {
        $validatedData = $request->validate([
            'title'     => 'required',
            'location'  => 'required',
            'start_date'=> 'required|date_format:Y-m-d\TH:i',
            'end_date'  => 'required|date_format:Y-m-d\TH:i',
            'booking_start' => 'required|date_format:Y-m-d\TH:i',
            'booking_end'   => 'required|date_format:Y-m-d\TH:i',
        ]);

        $startDate      = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_date']);
        $endDate        = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['end_date']);
        $bookingStart   = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_start']);
        $bookingEnd     = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_end']);

        $formattedStartDateTime      = $startDate->format('Y-m-d H:i:s');
        $formattedEndDateTime        = $endDate->format('Y-m-d H:i:s');
        $formattedBookingDateTime    = $bookingStart->format('Y-m-d H:i:s');
        $formattedBookingEndDateTime = $bookingEnd->format('Y-m-d H:i:s');

        $organizer      = Organizer::latest()->first();
        $organizer_id   = $organizer->id;

        $event = Event::create([
            'organizer_id'  => $organizer_id,
            'title'         => strip_tags($request->title),
            'location'      => strip_tags($request->location),
            'start_date'    => $formattedStartDateTime,
            'end_date'      => $formattedEndDateTime,
            'booking_start' => $formattedBookingDateTime,
            'booking_end'   => $formattedBookingEndDateTime
        ]);

        if ( $event) {
            return redirect()->back()->with('event', 'Event info set successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }
    }

    public function eventUpdate ( Request $request )
    {
        $validatedData = $request->validate([
            'title'     => 'required',
            'location'  => 'required',
            'start_date'=> 'required|date_format:Y-m-d\TH:i',
            'end_date'  => 'required|date_format:Y-m-d\TH:i',
            'booking_start' => 'required|date_format:Y-m-d\TH:i',
            'booking_end'   => 'required|date_format:Y-m-d\TH:i',
        ]);

        $startDate      = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_date']);
        $endDate        = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['end_date']);
        $bookingStart   = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_start']);
        $bookingEnd     = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_end']);

        $formattedStartDateTime      = $startDate->format('Y-m-d H:i:s');
        $formattedEndDateTime        = $endDate->format('Y-m-d H:i:s');
        $formattedBookingDateTime    = $bookingStart->format('Y-m-d H:i:s');
        $formattedBookingEndDateTime = $bookingEnd->format('Y-m-d H:i:s');

        $organizer      = Organizer::latest()->first();
        $organizer_id   = $organizer->id;

        $event          = Event::latest()->first();

        $event->title       = strip_tags($request->title);
        $event->location    = strip_tags($request->location);
        $event->start_date  = $formattedStartDateTime;
        $event->end_date    = $formattedEndDateTime;
        $event->booking_start = $formattedBookingDateTime;
        $event->booking_end   = $formattedBookingEndDateTime;

        $update = $event->update();

        if ($update){
            return redirect()->back()->with('event', 'Event info set successfully');
        } 
        else{
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }
    }

}
