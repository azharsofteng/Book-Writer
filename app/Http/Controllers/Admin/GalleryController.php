<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        try {
            $gallery = new Gallery();
            $gallery->title = $request->title;
            $gallery->image = $this->imageUpload($request, 'image', 'uploads/gallery');
            $gallery->ip = $request->ip();
            $gallery->save();
            Toastr::success('Gallery Insert Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::success('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function edit($id)
    {
        $data['gallery'] = Gallery::find($id);
        $data['galleries'] = Gallery::latest()->get();
        return view('admin.gallery', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png,bmp'
        ]);

        try {
            $gallery = Gallery::find($id);

            //image 
            $Image = $gallery->image;
            if ($request->hasFile('image')) {
                if (!empty($gallery->image) && file_exists($gallery->image)) 
                    unlink($gallery->image);
                $Image = $this->imageUpload($request, 'image', 'uploads/gallery');
            }

            $gallery->title = $request->title;
            $gallery->image = $Image;
            $gallery->ip = $request->ip();
            $gallery->save();
            Toastr::success('Gallery Update Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return redirect()->route('gallery.index');
        } catch (\Exception $e) {
            Toastr::success('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::find($id);
            if (!empty($gallery->image) && file_exists($gallery->image)) {
                unlink($gallery->image);
            }
            $gallery->delete();
            return back();
        } catch (\Exception $e) {
            Toastr::success('Something went wrong!', 'error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
