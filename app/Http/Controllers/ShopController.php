<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function filterByCategory($categoryId)
    {
        if ($categoryId == 'all') {
            $products = Product::all();
        } else {
            $products = Product::where('category_id', $categoryId)->get();
        }

        return response()->json($products);
    }
}
