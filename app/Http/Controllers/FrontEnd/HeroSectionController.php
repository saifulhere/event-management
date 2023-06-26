<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class HeroSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $hero = Hero::find(1);
        return view('Admin.Events.event', compact('hero'));
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

}
