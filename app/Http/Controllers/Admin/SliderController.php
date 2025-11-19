<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders', compact('sliders'));
    }

    public function create()
    {
        return view('admin.add-slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tagline' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);

        $imgName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/sliders'), $imgName);

        Slider::create([
            'tagline' => $request->tagline,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'link' => $request->link,
            'image' => $imgName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sliders')->with('success', 'Slider Added Successfully');
    }


    
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider-edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'tagline' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required'
        ]);

        $data = $request->only('tagline','title','subtitle','link','status');

        if($request->hasFile('image')){
            // delete old image
            if($slider->image && File::exists(public_path('uploads/sliders/'.$slider->image))){
                File::delete(public_path('uploads/sliders/'.$slider->image));
            }
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $filename);
            $data['image'] = $filename;
        }

        $slider->update($data);

        return redirect()->route('admin.sliders')->with('success','Slider updated successfully.');
    }


    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if (file_exists(public_path('uploads/sliders/'.$slider->image))) {
            unlink(public_path('uploads/sliders/'.$slider->image));
        }

        $slider->delete();

        return back()->with('success', 'Slider Deleted');
    }
}
