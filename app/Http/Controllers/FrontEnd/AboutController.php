<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\About;
use App\Models\Features;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $about = About::with('features')->find(1);
        return view('Admin.Events.about', compact('about'));
    }


    public function store(Request $request)
    {
        $about = About::create([
            'sub_heading' => $request->input('sub_heading'),
            'heading' => $request->input('heading'),
            'description' => $request->input('description'),
            'btn_url' => $request->input('btn_url'),
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpg,png,webp',
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

            $file->storeAs('public', $file_name);
            $about->bg_image = $file_name;
            $about->save();
        }

        foreach ($request->input('features', []) as $feature) {
            if (!empty($feature)) {
                Features::create([
                    'about_id' => $about->id,
                    'feature' => $feature,
                ]);
            }
        }

        $newFeatures = $request->input('new_features', []);

        foreach ($newFeatures as $newFeature) {
            if (!empty($newFeature)) {
                $about->features()->create([
                    'about_id' => $about->id,
                    'feature' => $newFeature]);
            }
        }

        $about->save();

        return redirect()->route('about', $about->id)->with('status', 'About record and Features added successfully.');
    }

    public function update(Request $request)
    {
        $about = About::find(1);

        $about->sub_heading = $request->input('sub_heading');
        $about->heading = $request->input('heading');
        $about->description = $request->input('description');
        $about->btn_url = $request->input('btn_url');

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpg,png,webp',
            ]);

            if ($about->bg_image) {
                Storage::delete('public/' . $about->bg_image);
            }

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

            $file->storeAs('public', $file_name);
            $about->bg_image = $file_name;
            $about->save();
        }

        $updatedFeatures = $request->input('features', []);

        foreach ($updatedFeatures as $featureId => $featureData) {
            if (!empty($featureData['feature'])) {
                $feature = Features::find($featureId);

                if ($feature) {
                    $feature->feature = $featureData['feature'];
                    $feature->save();
                }
            }
        }

        $newFeatures = $request->input('new_features', []);

        foreach ($newFeatures as $newFeature) {
            if (!empty($newFeature)) {
                $about->features()->create(['feature' => $newFeature]);
            }
        }

        $about->update();

        return redirect()->route('about')->with('status', 'About Updated Successfully');
    }

    public function feature(Request $request, $id)
    {
        $feature    = Features::find($id);

        $feature->delete();

        return redirect()->back()->with('status', 'Feature removed successfully');
    }
}
