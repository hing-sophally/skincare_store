<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class FrontendProductController extends Controller
{
    public function index()
    {
        // you can pass products from database here later
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.products.index',compact('products','categories'));
    }
}
