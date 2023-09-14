<?php

namespace App\Http\Controllers\EventManager;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\EventFeature;
use App\Models\EventGuest;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $organizer = Organizer::latest()->first();
        $user = auth()->user();
        $events      = Event::with('eventGuests')->where('user_id', $user->id)->paginate(10);
        return view('Admin.Eventmanager.Event.all-events', compact('organizer', 'events'));
    }

    public function create ()
    {
        $user           = auth()->user();
        $organizers     = Organizer::where('user_id', $user->id)->get();
        return view('Admin.EventManager.Event.create-event', compact('organizers'));
    }

    public function store (Request $request)
    {
        $validatedData = $request->validate([
            'organizer_id'  => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'location'      => 'required',
            'start_date'    => 'required|date_format:Y-m-d\TH:i',
            'end_date'      => 'required|date_format:Y-m-d\TH:i',
            'booking_start' => 'required|date_format:Y-m-d\TH:i',
            'booking_end'   => 'required|date_format:Y-m-d\TH:i'
        ]);

        $user       = auth()->user();
        $organizer  = Organizer::where('user_id', $user->id)->first();

        $startDate      = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_date']);
        $endDate        = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['end_date']);
        $bookingStart   = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_start']);
        $bookingEnd     = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_end']);

        $formattedStartDateTime      = $startDate->format('Y-m-d H:i:s');
        $formattedEndDateTime        = $endDate->format('Y-m-d H:i:s');
        $formattedBookingDateTime    = $bookingStart->format('Y-m-d H:i:s');
        $formattedBookingEndDateTime = $bookingEnd->format('Y-m-d H:i:s');

        $event = Event::create([
            'user_id'       => $user->id,
            'organizer_id'  => $request->organizer_id,
            'title'         => strip_tags($request->title),
            'tagline'       => strip_tags($request->tagline),
            'description'   => $request->description,
            'location'      => strip_tags($request->location),
            'start_date'    => $formattedStartDateTime,
            'end_date'      => $formattedEndDateTime,
            'booking_start' => $formattedBookingDateTime,
            'booking_end'   => $formattedBookingEndDateTime
        ]);

        if ($request->hasFile('thumbnail')) {

            $request->validate([
                'thumbnail' => 'image|mimes:jpg,png,webp', // Adjust the validation rules as needed
            ]);

            $file = $request->file('thumbnail');
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
            $event->thumbnail = $file_name;
            
            $event->update();
        }

        $newFeatures = $request->input('new_features', []);

        foreach ($newFeatures as $newFeature) {
            if (!empty($newFeature)) {
                $event->features()->create([
                    'event_id' => $event->id,
                    'feature' => $newFeature]);
            }
        }

        $newGuestNames = $request->input('guest_name', []);
        $newGuestDesignations = $request->input('guest_designation', []);
        $newGuestAbout = $request->input('guest_about', []);
        $newGuestImages = $request->file('guest_image', []);

        foreach ($newGuestNames as $index => $newGuestName) {
            if (!empty($newGuestName)) {
                $guest = $event->eventGuests()->create([
                    'event_id'      => $event->id,
                    'organizer_id'  => $organizer->id,
                    'name'          => $newGuestName,
                    'designation'   => $newGuestDesignations[$index],
                    'about'         => $newGuestAbout[$index],
                ]);

                if ($newGuestImages && isset($newGuestImages[$index])) {
                    $file = $newGuestImages[$index];
                    $file_name = time() . $file->getClientOriginalName();
                    $file->storeAs('public', $file_name);
                    $guest->profile = $file_name;
                    $guest->save();
                }
                $guest->save();
            }
        }

        $event->save();

        if ( $event )
        {
            return redirect()->back()->with('success', 'Event set successfully!');
        }else {
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }

    }

    public function edit (Request $request, $id)
    {
        $event = Event::find($id);
        return view('Admin.EventManager.Event.edit-event', compact('event'));
    }

    public function update (Request $request, $id)
    {
        $validatedData = $request->validate([
            'organizer_id'  => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'location'      => 'required',
            'start_date'    => 'required|date_format:Y-m-d\TH:i',
            'end_date'      => 'required|date_format:Y-m-d\TH:i',
            'booking_start' => 'required|date_format:Y-m-d\TH:i',
            'booking_end'   => 'required|date_format:Y-m-d\TH:i'
        ]);


        $event      = Event::find($id);

        $startDate      = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_date']);
        $endDate        = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['end_date']);
        $bookingStart   = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_start']);
        $bookingEnd     = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['booking_end']);

        $formattedStartDateTime      = $startDate->format('Y-m-d H:i:s');
        $formattedEndDateTime        = $endDate->format('Y-m-d H:i:s');
        $formattedBookingDateTime    = $bookingStart->format('Y-m-d H:i:s');
        $formattedBookingEndDateTime = $bookingEnd->format('Y-m-d H:i:s');


        $event->title       = strip_tags($request->title);
        $event->tagline     = strip_tags($request->tagline);
        $event->description = $request->description;
        $event->location    = strip_tags($request->location);
        $event->start_date  = $formattedStartDateTime;
        $event->end_date    = $formattedEndDateTime;
        $event->booking_start   = $formattedBookingDateTime;
        $event->organizer_id    = $request->organizer_id;
        $event->booking_end = $formattedBookingEndDateTime;


        $event->update();

        if ($request->hasFile('thumbnail')) {
            // Validate the uploaded file
            $request->validate([
                'thumbnail' => 'image|mimes:jpg,png,webp', // Adjust the validation rules as needed
            ]);
    
            if ($event->thumbnail) {
                $filePath = 'public/' . $event->thumbnail;
            
                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
            }
    
            // Retrieve the uploaded file
            $file = $request->file('thumbnail');
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
            $event->thumbnail = $file_name;
            $event->save();
        }

        $updatedFeatures = $request->input('features', []);

        foreach ($updatedFeatures as $featureId => $featureData) {
            if (!empty($featureData['feature'])) {
                $feature = EventFeature::find($featureId);

                if ($feature) {
                    $feature->feature = $featureData['feature'];
                    $feature->save();
                }
            }
        }

        $newFeatures = $request->input('new_features', []);

        foreach ($newFeatures as $newFeature) {
            if (!empty($newFeature)) {
                $event->features()->create(['feature' => $newFeature]);
            }
        }

        $updatedGuestIds = $request->input('guest_id', []);
        $updatedGuestNames = $request->input('update_guest_name', []);
        $updatedGuestDesignations = $request->input('update_guest_designation', []);
        $updatedGuestAbout = $request->input('update_guest_about', []);
        $updatedGuestImages = $request->file('update_guest_image', []);

        foreach ($updatedGuestIds as $index => $guestId) {
            $guest = EventGuest::find($guestId);

            if ($guest && $guest->event_id === $event->id) {
                $oldImage = $guest->profile; // Store old image name
                
                $guest->name = $updatedGuestNames[$index];
                $guest->designation = $updatedGuestDesignations[$index];
                $guest->about = $updatedGuestAbout[$index];

                if ($updatedGuestImages && isset($updatedGuestImages[$index])) {
                    if ($oldImage) {
                        // Delete old image from storage
                        Storage::delete('public/' . $oldImage);
                    }

                    $file = $updatedGuestImages[$index];
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('public', $file_name);
                    $guest->profile = $file_name;
                }

                $guest->save();
            }
        }


        $newGuestNames = $request->input('guest_name', []);
        $newGuestDesignations = $request->input('guest_designation', []);
        $newGuestAbout = $request->input('guest_about', []);
        $newGuestImages = $request->file('guest_image', []);

        foreach ($newGuestNames as $index => $newGuestName) {
            if (!empty($newGuestName)) {
                $guest = $event->eventGuests()->create([
                    'event_id'      => $event->id,
                    'name'          => $newGuestName,
                    'designation'   => $newGuestDesignations[$index],
                    'about'         => $newGuestAbout[$index],
                ]);

                if ($newGuestImages && isset($newGuestImages[$index])) {
                    $file = $newGuestImages[$index];
                    $file_name = time() . $file->getClientOriginalName();
                    $file->storeAs('public', $file_name);
                    $guest->profile = $file_name;
                    $guest->save();
                }
                $guest->save();
            }
        }


        $update = $event->update();
        if ($update)
        {
            return redirect()->back()->with('success', 'Event updated successfully!');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }

    }

    public function destroy (Request $request, $id)
    {
        $event = Event::find($id);

        if ($event->thumbnail) {
            $filePath = 'public/' . $event->thumbnail;
        
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
        
        $delete = $event->delete();
        if ($delete)
        {
            return redirect()->back()->with('success', 'Event updated successfully!');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }
        
    }
}
