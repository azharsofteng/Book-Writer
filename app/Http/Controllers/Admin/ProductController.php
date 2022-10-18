<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $products = Product::latest()->get();
        return view('admin.product.index', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|min:3',
            'short_details' => 'required|string|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        try {
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->short_details = $request->short_details;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->quantity = $request->quantity;
            $product->details = $request->details;
            $product->writer = $request->writer;
            $product->image = $this->imageUpload($request, 'image', 'uploads/product');
            $product->writer_image = $this->imageUpload($request, 'writer_image', 'uploads/product');
            $product->read_more_url = $request->read_more_url;
            $product->is_feature = $request->is_feature;
            $product->ip = $request->ip();
            $product->save();
            Toastr::success('Product Insert Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['products'] = Product::latest()->get();
        $data['categories'] = Category::latest()->get();
        return view('admin.product.index', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|min:3',
            'short_details' => 'required|string|min:3',
            'image' => 'mimes:jpg,jpeg,png,bmp',
        ]);

        try {
            $product = Product::find($id);

            //image 
            $Image = $product->image;
            if ($request->hasFile('image')) {
                if (!empty($product->image) && file_exists($product->image)) 
                    unlink($product->image);
                $Image = $this->imageUpload($request, 'image', 'uploads/product');
            }

            $WriterImage = $product->writer_image;
            if ($request->hasFile('writer_image')) {
                if (!empty($product->writer_image) && file_exists($product->writer_image)) 
                    unlink($product->writer_image);
                $WriterImage = $this->imageUpload($request, 'writer_image', 'uploads/product');
            }

            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->short_details = $request->short_details;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->quantity = $request->quantity;
            $product->details = $request->details;
            $product->writer = $request->writer;
            $product->image = $Image;
            $product->writer_image = $WriterImage;
            $product->read_more_url = $request->read_more_url;
            $product->is_feature = $request->is_feature;
            $product->ip = $request->ip();
            $product->save();
            Toastr::success('Product Update Success!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if (!empty($product->image) && file_exists($product->image)) {
                unlink($product->image);
            }
            if (!empty($product->writer_image) && file_exists($product->writer_image)) {
                unlink($product->writer_image);
            }
            $product->delete();
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
