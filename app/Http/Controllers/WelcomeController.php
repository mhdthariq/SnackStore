<?php

namespace App\Http\Controllers;

use App\Models\Product; // Model produk
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Kirim data produk ke view welcome.blade.php
        return view('welcome', compact('products'));
    }
}
