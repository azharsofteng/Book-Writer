<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'title' => 'required|string|min:3',
            'image' => 'mimes:jpg,jpeg,png,bmp'
        ]);

        try {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->title = $request->title;
            $category->description = $request->description;
            $category->image = $this->imageUpload($request, 'image', 'uploads/category');
            $category->ip = $request->ip();
            $category->save();
            Toastr::success('Category Insert Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::success($e->getMessage(), 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function edit($id)
    {
        $data['category'] = Category::find($id);
        $data['categories'] = Category::latest()->get();
        return view('admin.category.index', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'title' => 'required|string|min:3',
            'image' => 'mimes:jpg,jpeg,png,bmp'
        ]);

        try {
            $category = Category::find($id);

            //image 
            $Image = $category->image;
            if ($request->hasFile('image')) {
                if (!empty($category->image) && file_exists($category->image)) 
                    unlink($category->image);
                $Image = $this->imageUpload($request, 'image', 'uploads/category');
            }

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->title = $request->title;
            $category->description = $request->description;
            $category->image = $Image;
            $category->ip = $request->ip();
            $category->save();
            Toastr::success('Category Update Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Toastr::success($e->getMessage(), 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
