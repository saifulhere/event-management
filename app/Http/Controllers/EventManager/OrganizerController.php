<?php

namespace App\Http\Controllers\EventManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organizer;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OrganizerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = auth()->user();
        $organizers = Organizer::where('user_id', $user->id)->paginate(10);
        return view('Admin.EventManager.Organizer.all-organizers', compact('organizers'));
    }

    public function create ()
    {
        return view('Admin.EventManager.Organizer.create-organizer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'about'   => 'required',
            'phone'   => 'required',
            'email'   => 'required'
        ]);

        $sanitizedOrganization  = strip_tags($request->name);
        $sanitizedTagline       = strip_tags($request->tagline);
        $sanitizedAbout         = strip_tags($request->about);
        $sanitizedPhone         = strip_tags($request->phone);
        $sanitizedEmail         = strip_tags($request->email);
        $user_id                = auth()->user()->id;

        $organizer = Organizer::create([
            'user_id' => $user_id,
            'name'    => $sanitizedOrganization,
            'tagline' => $sanitizedTagline,
            'about'   => $sanitizedAbout,
            'phone'   => $sanitizedPhone,
            'email'   => $sanitizedEmail
        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,png,webp', // Adjust the validation rules as needed
            ]);

            $file = $request->file('image');
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
            $organizer->image = $file_name;
            
            $organizer->update();
        }

        if ($organizer)
        {
            return redirect()->back()->with('success', 'Organizer Info saved successful');
        }else {
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }
    }

    public function edit ($id)
    {
        $organizer  = Organizer::find($id);
        return view('Admin.EventManager.Organizer.edit-organizer', compact('organizer'));
    }

    public function update (Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'about'   => 'required',
            'phone'   => 'required',
            'email'   => 'required'
        ]);

        $sanitizedOrganization  = strip_tags($request->name);
        $sanitizedTagline       = strip_tags($request->tagline);
        $sanitizedAbout         = strip_tags($request->about);
        $sanitizedPhone         = strip_tags($request->phone);
        $sanitizedEmail         = strip_tags($request->email);
        $user      = auth()->user();

        $organizer = Organizer::where('user_id', $user->id)->first();

        if ($request->hasFile('image')) {
            // Validate the uploaded file
            $request->validate([
                'image' => 'image|mimes:jpg,png,webp', // Adjust the validation rules as needed
            ]);
    
            if ($organizer->image) {
                $filePath = 'public/' . $organizer->bg_image;
            
                if (Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
            }
    
            // Retrieve the uploaded file
            $file = $request->file('image');
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
            $organizer->bg_image = $file_name;
            $organizer->update();
        }
        
        $organizer->name    = $sanitizedOrganization;
        $organizer->tagline = $sanitizedTagline;
        $organizer->about   = $sanitizedAbout;
        $organizer->phone   = $sanitizedPhone;
        $organizer->email   = $sanitizedEmail;

        $organizer->update();

        if ($organizer)
        {
            return redirect()->back()->with('success', 'Organizer Info updated successful');
        }else {
            return redirect()->back()->with('wrong', 'Something went wrong!');
        }

    }
}
