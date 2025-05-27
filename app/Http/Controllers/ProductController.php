<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier')->get();
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
            'image' => 'nullable|image|max:2048', // validação da imagem (opcional)
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->supplier_id = $request->supplier_id;

        if ($request->hasFile('image')) {
            $image = file_get_contents($request->file('image')->getRealPath());
            $product->image = $image; // salvar binário no DB (como você já faz)
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
