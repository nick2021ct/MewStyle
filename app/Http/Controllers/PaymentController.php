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
        if (!session()->has('cart')) {
            toastr()->addError('There no Item to checkout');
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

        if ($orderTemp['payment_method'] == 'Momo') {
            $this->momoPayment();
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
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }


    public function momoPayment()
    {
       
    $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


    $partnerCode = "MOMOBKUN20180529";
$accessKey = "klm05TvNBzhg7h7j";
$secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
$orderInfo = "Thanh toán qua MoMo";
$amount = "10000";
$orderId = time() . "";
$returnUrl = "http://mewstyle.test/place-order";
$notifyurl = "http://mewstyle.test/place-order";
$extraData = "";
// Lưu ý: link notifyUrl không phải là dạng localhost
$bankCode = "SML";
     
$requestId = time() . "";
$requestType = "payWithMoMoATM";
         //before sign HMAC SHA256 signature
         $rawHashArr =  array(
                        'partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'bankCode' => $bankCode,
                        'returnUrl' => $returnUrl,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType
                        );
         // echo $serectkey;die;
         $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
         $signature = hash_hmac("sha256", $rawHash, $secretKey);
         $data =  array('partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'returnUrl' => $returnUrl,
                        'bankCode' => $bankCode,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature);
         $result =$this->execPostRequest($endpoint, json_encode($data));
         dd($result);
         $jsonResult = json_decode($result,true);  // decode json
         
         error_log( print_r( $jsonResult, true ) );
         header('Location: '.$jsonResult['payUrl']);
        


    }
}
