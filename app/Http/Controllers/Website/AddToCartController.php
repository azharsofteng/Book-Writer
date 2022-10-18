<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AddToCartController extends Controller
{
    public function Cart()
    {
        return view('pages.cart');
    }

    public function AddCart($id=null, $qty=null) 
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
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
    }

    public function addToCart($id)
    {
        $this->AddCart($id);   
        Toastr::success('Product added!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        return redirect()->back();
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
            Toastr::success('Cart updated successfully!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
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
            Toastr::success('Product removed successfully!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        }
    }
}
