<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddToCartController extends Controller
{
    public function Cart()
    {
        return view('pages.cart');
    }

    public function AddCart($id) 
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->cover_picture
            ];
        }
          
        session()->put('cart', $cart);
    }

    public function addToCart($id)
    {
        $this->AddCart($id);   
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function checkout($id)
    {
        $this->AddCart($id);   
        return redirect()->route('checkout.cart');
    }
  
    
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
