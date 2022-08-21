<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  'required|string|min:3',
            'cover_letter' =>  'required|string|min:3',
            'biography' =>  'required|string|min:3',
            'image' => 'mimes: jpg,png,jpeg,bmp',
            'signature' => 'mimes: jpg,png,jpeg,bmp',
        ]);

        try {
            $about = About::find($id);

            //image 
            $Image = $about->image;
            if ($request->hasFile('image')) {
                if (!empty($about->image) && file_exists($about->image)) 
                    unlink($about->image);
                $Image = $this->imageUpload($request, 'image', 'uploads/about');
            }

            //Signature 
            $Signature = $about->signature;
            if ($request->hasFile('signature')) {
                if (!empty($about->signature) && file_exists($about->signature)) 
                    unlink($about->signature);
                $Signature = $this->imageUpload($request, 'signature', 'uploads/about');
            }

            $about->name = $request->name;
            $about->cover_letter = $request->cover_letter;
            $about->biography = $request->biography;
            $about->about_books = $request->about_books;
            $about->want_meet = $request->want_meet;
            $about->inspiration = $request->inspiration;
            $about->facebook = $request->facebook;
            $about->instagram = $request->instagram;
            $about->twitter = $request->twitter;
            $about->google = $request->google;
            $about->image = $Image;
            $about->signature = $Signature;
            $about->save();
            Toastr::success('About Update Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::success('Something went wrong!' , 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
