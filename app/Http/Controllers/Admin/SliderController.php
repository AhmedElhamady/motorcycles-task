<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'tag.*' => 'required|string',
            'bio.*' => 'required|string',
            'type_text.*' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:10240', // 10MB
        ]);
        unset($data['image'], $data['cv']);

        if ($request->image) {
            $data['image'] = Helper::updateImage($request->file('image'), $slider->image, 'sliders');
        }
        if ($request->cv) {
            $data['cv'] = Helper::updateFile($request->file('cv'), $slider->cv, 'cv');
        }

        // Process tags for each locale
        if (isset($data['type_text'])) {
            foreach ($data['type_text'] as $locale => $tagsString) {
                if (! empty($tagsString)) {
                    $tagsArray = [];
                    // Check if input is a JSON string from Tagify
                    $decoded = is_string($tagsString) ? json_decode($tagsString, true) : null;
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        foreach ($decoded as $tag) {
                            if (is_array($tag) && isset($tag['value'])) {
                                $tagsArray[] = trim($tag['value']);
                            } elseif (is_string($tag)) {
                                $tagsArray[] = trim($tag);
                            }
                        }
                    } elseif (is_string($tagsString)) {
                        $tagsArray = array_map('trim', explode(',', $tagsString));
                    } elseif (is_array($tagsString)) {
                        $tagsArray = $tagsString;
                    }
                    $data['type_text'][$locale] = array_values(array_filter($tagsArray));
                } else {
                    $data['type_text'][$locale] = [];
                }
            }
        }

        $slider->update($data);

        return redirect()->route('sliders.index');
    }

    public function destroy(Request $request, Slider $slider)
    {
        $slider = Slider::findOrFail($slider->id);
        Helper::deleteImage($slider->image);
        $slider->delete();

        return back();
    }
}
