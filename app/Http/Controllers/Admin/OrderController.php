<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function PlaceOrder(Request $request)
    {
        // dd($request->all());
        $cart = json_decode($request->cart);
        $cart = array_values((array)$cart);
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->invoice_no = $this->generateCode('Order', date('ym'));
            $order->customer_id = Auth::guard('customer')->user()->id;
            $order->name = $request->name;
            $order->mobile = $request->mobile;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->shipping_address = $request->shipping_address ?? $request->address;
            $order->sub_total = $request->sub_total;
            $order->shipping_cost = 0;
            $order->payment_type = 'cash';
            $order->note = $request->note;
            $order->save();

            $order_id = $order['id'];

            foreach ($cart as $item) {
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order_id;
                $orderDetails->product_id = $item->id;
                $orderDetails->quantity = $item->quantity;
                $orderDetails->price = $item->price;
                $orderDetails->total = $item->quantity * $item->price;
                $orderDetails->save();
            }

            DB::commit();
            Toastr::success('Order successfully Placed!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            session()->put('cart', []);
            return back();

        } catch (\Exception $e) {
            Toastr::error('Order Failed!', 'Error', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
            DB::rollBack();
            return back();
        }
    }

    public function orderList()
    {
        $pendingOrders = Order::latest()->where('status', 0)->get();
        $confirmOrders = Order::latest()->where('status', 1)->get();
        $processOrders = Order::latest()->where('status', 2)->get();
        $shippingOrders = Order::latest()->where('status', 3)->get();
        $deliveredOrders = Order::latest()->where('status', 4)->get();
        $cancelOrders = Order::onlyTrashed()->get();
        return view('admin.order.list', compact('pendingOrders', 'confirmOrders', 'processOrders', 'shippingOrders', 'deliveredOrders', 'cancelOrders'));
    }

    public function orderCancel($id) 
    {
        $order = Order::find($id);
        $order->delete();
        return back();
    }

    public function invoice($id)
    {
        $order = Order::with('order_details')->where('id', $id)->withTrashed()->first();
        return view('admin.order.invoice', compact('order'));
    }

    public function confirmOrder($id) 
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        Toastr::success('Order Confirmed!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        return back();
    }
    public function processOrder($id) 
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        Toastr::success('Order Process!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        return back();
    }
    public function shippingOrder($id) 
    {
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        Toastr::success('Order Shipping!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        return back();
    }
    public function deliveryOrder($id) 
    {
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        Toastr::success('Order Delivered!', 'Success', ["positionClass" => "toast-top-right","closeButton" => true,
            "progressBar" => true]);
        return back();
    }

}
