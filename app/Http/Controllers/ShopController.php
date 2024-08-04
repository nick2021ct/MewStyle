<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(Request $request,$categoryId = null)
    {
        $categories = Category::all();

        if ($categoryId) {
            $products = Product::with('images')->where('category_id', $categoryId)->get();
        } else {
            $products = Product::all();
        }

        return view('user.shop', compact('categories', 'products'));
    }


}
