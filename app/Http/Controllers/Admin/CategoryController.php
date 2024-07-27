<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function list()
    {
        $categories = Category::all();
        return view('admin.category.list',compact('categories'));
    }
    public function create()
    {
        return view('admin.category.add');
    }
    
    private function validateCategory(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'unique:categories,name'],
        ]);
    }

    public function add(Request $request)
    {
        $validator = $this->validateCategory($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
       $cate = new Category();
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
        $categories->name = $request->name;
        $categories->save();

        toastr()->addSuccess('sửa category thành công');

        return redirect()->back();
    }

    public function delete(Request $request,$id)
    {
        $categories = Category::find($id);
        $categories->delete();

        toastr()->addSuccess('xoá category thành công');

        return redirect()->back();  

    }
}
