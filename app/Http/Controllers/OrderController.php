<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        if (!session()->has('cart')) {
            toastr()->addError('There no Item to checkout');
            return redirect()->back();
        }

        $cart = session('cart');
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $order = new Orders();
        $order->user_id = auth()->user()->id;
        $order->user_fullname = $request->name;
        $order->user_email = $request->email;
        $order->user_phone = $request->phone;
        $order->user_address = $request->address;
        $order->note = $request->note;
        $order->payment_method = $request->payment_method;
        $order->status = 'pending';
        $order->total_money = $total;
        $order->save();


        foreach($cart as $id => $details){
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $id;
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->price = $details['price'];
            $orderDetail->save();
        }

        session()->forget('cart');

        toastr()->addSuccess('Order has been placed successfully');
        return redirect()->route('home');
    }
}
