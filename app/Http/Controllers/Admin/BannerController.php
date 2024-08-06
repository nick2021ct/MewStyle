<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    use ImageUploadTrait;

    public function validateBanner(Request $request)
    {
        return Validator::make($request->all(),[
            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'product_image'=>['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'title'=>['required','max:200'],
            'price'=>['required','numeric'],
            'sale_price'=>['numeric'],
            'description'=>['required'],
            ])->after(function ($validator) use ($request){
                if ($request->sale_price >= $request->price) {
                    $validator->errors()->add('sale_price', 'Sale price must be less than the regular price.');
                }
            });
    }



    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.banner.index',compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.add');
    }

    public function add(Request $request)
    {
        $validator =$this->validateBanner($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $banner = new Banner();

        $imagePath = $this->uploadImage($request,'image','images/banner');

        $productImagePath = $this->uploadImage($request,'product_image','images/banner/product');

        $banner->image = $imagePath;
        $banner->product_image = $productImagePath;
        $banner->title = $request->title;
        $banner->content =$request->content;
        $banner->price = $request->price;
        $banner->sale_price = $request->sale_price;
        $banner->description = $request->description;
        $banner->save();

        toastr()->addCreated('Banner created successfully');
        return redirect()->back();
        
    }

    public function update(Request $request,$id)
    {
        $banners = Banner::findOrFail($id);
        return view('admin.banner.edit',compact('banners'));
    }

    public function edit(Request $request,$id)
    {
        $validator =$this->validateBanner($request);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $banner = Banner::findOrFail($id);

        $imagePath = $this->updateImage($request,'image','images/banner', $banner->image);
        $productImagePath = $this->updateImage($request,'product_image','images/banner/product',$banner->product_image);
        
        $banner->image = $imagePath;
        $banner->product_image = $productImagePath;
        $banner->title = $request->title;
        $banner->content =$request->content;
        $banner->price = $request->price;
        $banner->sale_price = $request->sale_price;
        $banner->description = $request->description;
        $banner->save();

        toastr()->addCreated('Banner updated successfully');
        return redirect()->back();

    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $this->deleteImage($banner->image);
        $banner->delete();

        toastr()->addCreated('Banner deleted successfully');
        return redirect()->back();
    }
}
