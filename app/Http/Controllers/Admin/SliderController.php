<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::query()->orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderFormRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/slider/', $fileName);
            $data['image'] = "uploads/slider/$fileName";
        }

        $data['status'] = $request->status == true ? '1' : '0';

        Slider::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'status' => $data['status'],
        ]);

        return redirect('admin/sliders')->with('message', 'Add Slider Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderFormRequest $request, Slider $slider)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {

            $destination = $slider->image;
            if(File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/slider/', $fileName);
            $data['image'] = "uploads/slider/$fileName";
        }

        $data['status'] = $request->status == true ? '1' : '0';

        Slider::where('id', $slider->id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'] ?? $slider->image,
            'status' => $data['status'],
        ]);

        return redirect('admin/sliders')->with('message', 'Update Slider Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if($slider->count() > 0) {
            $destination = $slider->image;
            if(File::exists($destination)) {
                File::delete($destination);
            }
            $slider->delete();
        }
        return redirect('admin/sliders')->with('message', 'Delete Slider Successfully');
    }
    public function deleteSlider(Request $request)
    {
        $slider = Slider::findOrFail($request->slider_id);
        if($slider->count() > 0) {
            $destination = $slider->image;
            if(File::exists($destination)) {
                File::delete($destination);
            }
            $slider->delete();
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'something_wrong'
        ]);

    }
}
