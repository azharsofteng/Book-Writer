<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->latest()->take(3)->get();
        return view('pages.customer.dashboard', compact('orders'));
    }

    public function allOrder()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->latest()->get();
        return view('pages.customer.orders', compact('orders'));
    }

    public function CustomerOrderShow($id)
    {
        $order = Order::with(['customer'])->where('customer_id', Auth::guard('customer')->user()->id)->where('id', $id)->first();
        $orderItem = OrderDetails::with(['product', 'product.category' => function($c) {
            $c->select('id', 'name');
        }])->where('order_id', $id)->latest()->get();
        return view('pages.customer.order_details',compact('order', 'orderItem'));
    }

    public function pendingOrder()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->where('status', 0)->latest()->get();
        return view('pages.customer.pending_order', compact('orders'));
    }

    public function approvedOrder()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->where('status', 4)->latest()->get();
        return view('pages.customer.approved_order', compact('orders'));
    }

    public function canceledOrder()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->onlyTrashed()->get();
        return view('pages.customer.canceled_order', compact('orders'));
    }

    public function orderPrint($id)
    {
        $order = Order::with(['customer'])->where('customer_id', Auth::guard('customer')->user()->id)->where('id', $id)->first();
        $orderItem = OrderDetails::with('product')->where('order_id', $id)->latest()->get();
        return view('pages.customer.order_print', compact('order', 'orderItem'));
    }

    public function Profile()
    {
        return view('pages.customer.profile');
    }

    public function profileUpdate(Request $request, $id)
    {
        try {
            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
            Toastr::success('Profile Update Successfully!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();

        } catch (\Exception $e) {
            Toastr::error('Something went wrong!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return back();
        }

    }

    public function changePassword()
    {
        return view('pages.customer.change_password');
    }

    // Customer Update Password
    public function updatePassword(Request $request)
    {
        
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $has_password = Auth::guard('customer')->user()->password;

        if(Hash::check($request->old_password, $has_password)){
            $user = Customer::findOrFail(Auth::guard('customer')->id());
            $user->password = Hash::make($request->password);
            $user->save();
            
            Toastr::success('Your Password Change Successfully!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            Auth::guard('customer')->logout();
            return Redirect()->route('customer.login');
        }else{
            Toastr::error('Old password dose not match!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            return Redirect()->back();
        }
    }

}
