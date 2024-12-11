<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        // Validasi input
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil produk berdasarkan ID
        $product = Product::find($productId);

        // Pastikan produk ada
        if (!$product) {
            return redirect()->back()->withErrors('Produk tidak ditemukan.');
        }

        // Tambahkan data ke tabel carts
        Cart::create([
            'user_id' => auth()->id(), // Ambil ID user yang sedang login
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price, // Harga produk
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Metode untuk memperbarui jumlah produk dalam keranjang
    public function update(Request $request, $cartId)
    {
        // Validasi input jumlah produk
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Cari item keranjang berdasarkan ID
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('id', $cartId)
                        ->first();

        // Pastikan item keranjang ada
        if (!$cartItem) {
            return redirect()->route('cart.index')->withErrors('Item keranjang tidak ditemukan.');
        }

        // Update jumlah produk dalam keranjang
        $cartItem->quantity = $request->quantity;
        $cartItem->price = $cartItem->product->price * $request->quantity; // Sesuaikan harga dengan jumlah baru
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    // Metode untuk menghapus item dari keranjang
    public function destroy($cartId)
    {
        // Cari item keranjang berdasarkan ID
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('id', $cartId)
                        ->first();

        // Pastikan item keranjang ada
        if (!$cartItem) {
            return redirect()->route('cart.index')->withErrors('Item keranjang tidak ditemukan.');
        }

        // Hapus item dari keranjang
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
