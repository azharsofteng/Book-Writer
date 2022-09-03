<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('pages.details', compact('product'));
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

    public function shop()
    {
        return view('pages.shop');
    }

}
