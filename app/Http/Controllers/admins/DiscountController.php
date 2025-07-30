<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('product')->latest()->paginate(10);
        return view('admin.discounts.index', compact('discounts'));
    }


    public function create()
    {
        $products = Product::all(); // fetch all products for dropdown
        return view('admin.discounts.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:fixed,percent',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'active' => 'required|boolean',
        ]);

        Discount::create($request->only([
            'name', 'product_id', 'type', 'amount', 'start_date', 'end_date', 'active'
        ]));

        return redirect()->route('discounts.index')->with('success', 'Discount created');
    }


    public function edit(Discount $discount)
    {
        $products = Product::all(); // fetch products for dropdown
        return view('admin.discounts.edit', compact('discount', 'products'));
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id', // validate product exists
            'type' => 'required|in:fixed,percent',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'active' => 'required|boolean',
        ]);

        $discount->update($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount updated');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted');
    }
}
