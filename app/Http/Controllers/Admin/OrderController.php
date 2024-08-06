<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::all();
        return view('admin.orders.list',compact('orders'));
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(string $id)
    {
        $order = Orders::find($id);
        $statuses = ['pending' => 'Pending', 'prepare' => 'Prepare', 'shipping' => 'Shipping', 'success' => 'Success','cancel' => 'Cancel']; 
        return view('admin.orders.edit',compact('order','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
    {
        $validator = Validator($request->all(),[
            'user_fullname'=>'required',
            'user_email'=> 'required|email',
            'user_phone'=> 'required|numeric',
            'user_address'=> 'required',
            'total_money'=> 'required|numeric',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $order = Orders::find($id);
        $order->user_fullname = $request->user_fullname;
        $order->user_email = $request->user_email;
        $order->user_phone = $request->user_phone;
        $order->user_address = $request->user_address;
        $order->note = $request->note;
        $order->total_money = $request->total_money;
        $order->status = $request->status;
        $order->save();

        toastr()->addSuccess('Order updated sucessfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OrderDetail::where('order_id', $id)->delete();

        $order = Orders::find($id);
        $order->delete();
        toastr()->addSuccess('Order deleted sucessfully');
        return redirect()->back();
        
    }
}
