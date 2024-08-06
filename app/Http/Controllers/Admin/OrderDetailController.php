<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $orderDetails = OrderDetail::where('order_id',$id)->get();
        return view('admin.order-detail.list',compact('orderDetails'));
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function update(string $id)
    {
        $orderDetail = OrderDetail::find($id);
        return view('admin.order-detail.edit',compact('orderDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'quantity'=>'required|numeric',
            'price'=>'required|numeric',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $orderDetail = OrderDetail::find($id);
        $orderDetail->quantity = $request->quantity;
        $orderDetail->price = $request->price;
        $orderDetail->save();

        toastr()->addSuccess('Order detail updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->delete();

        toastr()->addSuccess('Order detail delete successfully');
        return redirect()->back();

    }
}
