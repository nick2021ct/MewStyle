<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    use ImageUploadTrait;

    public function validateProduct(Request $request)
    {
        return Validator::make($request->all(),[
            'images.*' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'name'=>['required','max:200'],
            'description'=>['required'],
            'price'=>['required','numeric'],
            'sale_price'=>['numeric'],
            'category_id'=>['required','exists:categories,id'],
        ])->after(function ($validator) use ($request){
            if ($request->sale_price >= $request->price) {
                $validator->errors()->add('sale_price', 'Sale price must be less than the regular price.');
            }
            if (count($request->file('images', [])) > 4) {
                $validator->errors()->add('images', 'You may only upload up to 4 images.');
            }
        });
    }
    public function index(){
        $products = Product::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.product.list',compact('products'));
    }
         
    
    public function create(Request $request)
    {
        $category = Category::get();
        return view('admin.product.add',compact('category'));
    }

    public function add(Request $request)
    {
        $validator = $this->validateProduct($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $product = new Product();


        $imagePath = $this->uploadImage($request,'main_image','images/product/main');
        $product->main_image = $imagePath;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->save();

        if($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                
                $imageName = uniqid().'_'.$image->getClientOriginalName(); 
                $image->move(public_path('images/product'), $imageName);    
                $path = 'images/product/' . $imageName;
                $product->images()->create(['image' => $path]);
            }
        }


        toastr()->addSuccess('Prduct created successfully');
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $product = Product::with('images')->findOrFail($id);
        $category = Category::all();
        return view('admin.product.edit',compact('category','product'));
    }

    public function edit(Request $request,$id)
    {
        $validator = $this->validateProduct($request);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::with('images')->findOrFail($id);

        $imagePath = $this->updateImage($request,'main_image','images/product/main',$product->main_image);
        $product->main_image = $imagePath;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->save();

        if($request->hasFile('images')){
            foreach($product->images as $oldImage){
                if(Storage::exists($oldImage->image)){
                    Storage::delete($oldImage->image);
                }
                $oldImage->delete();
            }
            foreach ($request->file('images') as $image){

                $imageName = uniqid().'_'.$image->getClientOriginalName(); 
                $image->move(public_path('images/product'), $imageName);    
                $path = 'images/product/' . $imageName;
                $product->images()->create(['image' => $path]);

            }
        }
       

        toastr()->addSuccess('Prduct updated successfully');
        return redirect()->back();
    }

    public function destroy(Request $request,$id)
    {
        $product = Product::with('images')->findOrFail($id);

        foreach($product->images as $oldImage){
            if(Storage::exists($oldImage->image)){
                Storage::delete($oldImage->image);
            }
            $oldImage->delete();
        }

        $product->delete();
    toastr()->addSuccess('Product deleted successfully');
    return redirect()->back();
    }

    
}
