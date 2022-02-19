<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'price' => ['required']
        ]);
        Product::create($validated);
        return to_route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'price' => ['required']
        ]);
        $product->update($validated);
        return to_route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index');
    }

}
