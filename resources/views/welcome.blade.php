<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-r from-green-50 via-blue-50 to-indigo-100 dark:bg-gradient-to-r dark:from-gray-800 dark:via-gray-900 dark:to-gray-700">
    <div class="text-black/50 dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <!-- Bagian Header -->
            <header class="flex justify-between items-center w-full max-w-7xl mx-auto py-4">
                <h1 class="text-3xl font-bold">Selamat Datang</h1>
                @if (Route::has('login'))
                    <nav>
                        @auth
                            <!-- Tombol Dashboard dengan warna biru -->
                            <a href="{{ url('/dashboard') }}" 
                               class="bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 transition">
                                Dashboard
                            </a>
                        @else
                            <!-- Tombol Log in dengan warna hijau -->
                            <a href="{{ route('login') }}" 
                               class="bg-green-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-green-600 transition">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <!-- Tombol Register dengan warna oranye -->
                                <a href="{{ route('register') }}" 
                                   class="bg-orange-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-orange-600 transition ml-4">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <!-- Bagian Produk -->
            <main class="container mx-auto mt-6">
                <h2 class="text-2xl font-bold mb-4">Daftar Produk</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                                <p class="text-gray-700">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
</body>
</html>
