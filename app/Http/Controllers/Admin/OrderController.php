<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Category;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function list()
    {
        $orders = Orders::all();
        return view('admin.order.list',compact('orders'));
    }
    public function listOrder_detail()
    {
        $orders = Orders::all();
        return view('admin.order.listOrderDetail',compact('order_details'));
    }
    // public function create()
    // {
    //     return view('admin.category.add');
    // }
    
    // private function validateCategory(Request $request)
    // {
    //     return Validator::make($request->all(), [
    //         'name' => ['required', 'unique:categories,name'],
    //     ]);
    // }

    // public function add(Request $request)
    // {
    //     $validator = $this->validateCategory($request);

    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //    $cate = new Orders();
    //    $cate->name = $request->name;
    //    $cate->save();
        
    //    toastr()->addSuccess('thêm category thành công');
    //    return redirect()->back();
    // }

    // public function update(Request $request,$id)
    // {
    //     $categories = Orders::find($id);

    //     return view('admin.category.edit',compact('categories'));
    // }

    // public function edit(Request $request,$id)
    // {
    //     $validator = Validator::make($request->all(),[
    //         'images.*' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
    //         'name'=>['required','max:200'],
    //         'description'=>['required'],
    //         'price'=>['required','numeric'],
    //         'sale_price'=>['numeric'],
    //         'category_id'=>['required','exists:categories,id'],
    //     ]);

    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $product = Orders::with('images')->findOrFail($id);

    //     $product->name = $request->name;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->sale_price = $request->sale_price;
    //     $product->category_id = $request->category_id;
    //     $product->save();

    //     if($request->hasFile('images')){
    //         foreach($product->images as $oldImage){
    //             if(Storage::exists($oldImage->image)){
    //                 Storage::delete($oldImage->image);
    //             }
    //             $oldImage->delete();
    //         }
    //         foreach ($request->file('images') as $image){

    //             $imageName = uniqid().'_'.$image->getClientOriginalName(); 
    //             $image->move(public_path('images/product'), $imageName);    
    //             $path = 'images/product/' . $imageName;
    //             $product->images()->create(['image' => $path]);

    //         }
    //     }

    //     toastr()->addSuccess('Prduct updated successfully');
    //     return redirect()->back();
        
    // }


    public function delete(Request $request,$id)
    {
        $categories = Orders::find($id);
        $categories->delete();

        toastr()->addSuccess('xoá category thành công');

        return redirect()->back();  

    }
}
