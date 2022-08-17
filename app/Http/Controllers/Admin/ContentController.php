<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContentController extends Controller
{
    public function content()
    {
        $content = Content::first();
        return view('admin.content', compact('content'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  'required|string|min:3',
            'email' =>  'required|email',
            'phone' =>  'required',
            'address' =>  'required|string|min:3',
            'logo' => 'mimes: jpg,png,jpeg,bmp',
        ]);

        try {
            $content = Content::find($id);

            //Logo 
            $LogoImg = $content->logo;
            if ($request->hasFile('logo')) {
                if (!empty($content->logo) && file_exists($content->logo)) 
                    unlink($content->logo);
                $LogoImg = $this->imageUpload($request, 'logo', 'uploads/about');
            }

            $content->name = $request->name;
            $content->email = $request->email;
            $content->phone = $request->phone;
            $content->address = $request->address;
            $content->short_details = $request->short_details;
            $content->map_address = $request->map_address;
            $content->logo = $LogoImg;
            $content->save();
            Toastr::success('Content Update Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::success($e->getMessage() , 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
