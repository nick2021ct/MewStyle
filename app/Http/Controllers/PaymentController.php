<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccess;
use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function placeOrder(Request $request)
    {
        if (!session()->has('cart') || empty(session('cart'))) {
            toastr()->error('There are no items to checkout');
            return redirect()->back();
        }

        $cart = session('cart');
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $orderTemp = [
            'user_id' => auth()->user()->id,
            'user_fullname' => $request->name,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'user_address' => $request->address,
            'note' => $request->note,
            'payment_method' => $request->payment_method,
            'total_money' => $total,
            'cart' => $cart,
        ];
        session()->put('order_temp', $orderTemp);


        if ($orderTemp['payment_method'] == 'COD') {
            $this->createOrder($orderTemp);
            
            toastr()->addSuccess('Order has been placed successfully with COD.');

            return redirect()->route('thankyou');
        }

        if ($orderTemp['payment_method'] == 'stripe') {
            $this->stripePayment($orderTemp);
        }
    }


    private function createOrder($orderTemp)
    {
        $order = new Orders();
        $order->user_id = $orderTemp['user_id'];
        $order->user_fullname = $orderTemp['user_fullname'];
        $order->user_email = $orderTemp['user_email'];
        $order->user_phone = $orderTemp['user_phone'];
        $order->user_address = $orderTemp['user_address'];
        $order->note = $orderTemp['note'];
        $order->payment_method = $orderTemp['payment_method'];
        $order->status = 'pending';
        $order->total_money = $orderTemp['total_money'];
        $order->save();

        foreach ($orderTemp['cart'] as $id => $details) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $id;
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->price = $details['price'];
            $orderDetail->save();
        }

        $orderDetails = OrderDetail::where('order_id',$order->id)->get();
        Mail::to($order->user_email)->send(new OrderSuccess($order,$orderDetails));


        session()->forget('cart');
        session()->forget('order_temp');
    }

    public function thankyou()
    {
        return view('user.thankyou');
    }


// phần code của ngân hàng
   
    

   
}
