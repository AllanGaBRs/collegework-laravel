<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;

class ProductController extends Controller
{
   public function index(Request $request)
{
    $search = $request->input('search');

    $query = Product::query();

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    $products = $query->with('supplier')->orderBy('name')->paginate(8);

    return view('products.index', compact('products'));
}


    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->supplier_id = $request->supplier_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image->getRealPath());
            $product->image = $imageData;
        }

        $product->save();

        return redirect()->route('products.index');
    }


    public function edit(Product $product)
    {
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->supplier_id = $request->supplier_id;

        if ($request->hasFile('image')) {
            $image = file_get_contents($request->file('image')->getRealPath());
            $product->image = $image;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
