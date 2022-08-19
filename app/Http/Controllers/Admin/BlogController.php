<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'date' => 'required|date',
            'image' => 'mimes:jpg,jpeg,png,bmp'
        ]);

        try {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->date = $request->date;
            $blog->description = $request->description;
            $blog->image = $this->imageUpload($request, 'image', 'uploads/blog');
            $blog->ip = $request->ip();
            $blog->save();
            Toastr::success('Blog Insert Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::success($e->getMessage(), 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function edit($id)
    {
        $data['blog'] = Blog::find($id);
        $data['blogs'] = Blog::latest()->get();
        return view('admin.blog.index', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'date' => 'required|date',
            'image' => 'mimes:jpg,jpeg,png,bmp'
        ]);

        try {
            $blog = Blog::find($id);

            //image 
            $Image = $blog->image;
            if ($request->hasFile('image')) {
                if (!empty($blog->image) && file_exists($blog->image)) 
                    unlink($blog->image);
                $Image = $this->imageUpload($request, 'image', 'uploads/blog');
            }

            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->date = $request->date;
            $blog->description = $request->description;
            $blog->image = $Image;
            $blog->ip = $request->ip();
            $blog->save();
            Toastr::success('Blog Update Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return redirect()->route('blog.index');
        } catch (\Exception $e) {
            Toastr::success($e->getMessage(), 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
