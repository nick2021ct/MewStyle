<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($id){
        
        $products = Product::with('images')->with('category')->findOrFail($id);
        return view('user.detail',compact('products'));
    }

}
