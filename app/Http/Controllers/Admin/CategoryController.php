<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ImageUploadTrait;

    public function list()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.list',compact('categories'));
    }
    public function create()
    {
        return view('admin.category.add');
    }
    
    private function validateCategory(Request $request)
    {
        return Validator::make($request->all(), [
            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'name' => ['required', 'unique:categories,name'],
        ]);
    }

    public function add(Request $request)
    {
        $validator = $this->validateCategory($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePath = $this->uploadImage($request,'image','images/category');

       $cate = new Category();
       $cate->image = $imagePath;
       $cate->name = $request->name;
       $cate->save();
        
       toastr()->addSuccess('thêm category thành công');
       return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $categories = Category::find($id);

        return view('admin.category.edit',compact('categories'));
    }

    public function edit(Request $request,$id)
    {
        $validator = $this->validateCategory($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $categories = Category::find($id);
        $imagePath = $this->updateImage($request,'image','images/category', $categories->image);
        $categories->image = $imagePath;
        $categories->name = $request->name;
        $categories->save();

        toastr()->addSuccess('sửa category thành công');

        return redirect()->back();
    }

    public function delete(Request $request,$id)
    {
        $categories = Category::find($id);
        $this->deleteImage($categories->image);
        $categories->delete();

        toastr()->addSuccess('xoá category thành công');

        return redirect()->back();  

    }
}
