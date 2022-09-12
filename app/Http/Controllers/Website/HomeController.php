<?php

namespace App\Http\Controllers\Website;

use App\Models\Blog;
use App\Models\About;
use App\Models\Banner;
use App\Models\Message;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        $data['banner'] = Banner::first();
        $data['new_book'] = Product::first();
        $data['products'] = Product::latest()->get()->skip(1)->take(6);
        $data['featured'] = Product::where('is_feature', 1)->first();
        $data['categories'] =  Category::get()->take(3);
        return view('pages.home', $data);
    }

    public function about()
    {
        $about = About::first();
        return view('pages.about', compact('about'));
    }

    public function bookDetails($slug)
    {
        $product =  Product::where('slug', $slug)->first();
        $more_products = Product::where('id', '!=', $product->id)->where('writer', $product->writer)->get()->take(6);
        $cat_products = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->get()->take(6);
        return view('pages.details', compact('product', 'more_products', 'cat_products'));
    }

    public function category()
    {
        $categories = Category::latest()->get();
        return view('pages.category', compact('categories'));
    }

    public function CheckOut()
    {
        return view('pages.checkout');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function shop($id = null)
    {
        if(isset($id)){
            $products = Product::where('category_id', $id)->latest()->paginate(9);
        } else {
            $products = Product::latest()->paginate(9);
        }
        return view('pages.shop', compact('products'));
    }


    public function blog()
    {
        $blogs = Blog::latest()->get();
        $book = Product::latest()->first();
        return view('pages.blog', compact('blogs', 'book'));
    }


    public function messageStore(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
        ]);

        try {
            $message = new Message();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->subject = $request->subject;
            $message->message = $request->message;
            $message->save();
            Toastr::success('Message Successfully send!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }

}
