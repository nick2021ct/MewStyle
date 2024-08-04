<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('user.cart');
    }

    public function add(Request $request ,$id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity');


        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
        } else {
            $cart[$id] = [
                'product_name' => $product->name,
                'image' => $product->main_image,
                'price' => $product->sale_price ?? $product->price,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
        toastr()->addSuccess('Add to cart successfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart =session()->get('cart');
            $cart[$request->id]['quantity']=$request->quantity;
            session()->put('cart',$cart);
        }
    }


    public function delete(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            toastr()->addSuccess('Add to cart successfully');
            return redirect()->back(); 
        }
    }
}
