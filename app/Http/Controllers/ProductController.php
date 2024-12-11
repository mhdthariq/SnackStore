<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('category')->get(); // Ambil semua produk dengan kategori
        return view('products.index', compact('products')); // Kirim data ke view products/index.blade.php
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create'); // Tampilkan form untuk membuat produk baru
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stock' => 'required|integer',
        ]);

        $data = $request->all();

        // Simpan gambar jika diunggah
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Product::create($data); // Simpan produk

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }



    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product')); // Tampilkan form untuk mengedit produk
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stock' => 'required|integer',
        ]);

        $data = $request->all();

        // Simpan gambar baru jika diunggah
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($data); // Update produk

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete(); // Hapus produk
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
