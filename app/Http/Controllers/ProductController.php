<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // you can pass products from database here later
        return view('frontend.products.product');
    }
}
