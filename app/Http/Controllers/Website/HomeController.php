<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Product::latest()->get()->take(6);
        $data['featured'] = Product::where('is_feature', 1)->first();
        $data['categories'] =  Category::all();
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
}
