<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-50 h-64 object-cover mb-4">
                    <h3 class="text-2xl font-bold"><span class="font-bold">Nama Produk:</span>{{ $product->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-4"><span class="font-bold">Deskripsi:</span>{{ $product->description }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-4"><span class="font-bold">Stok:</span>{{ $product->stock }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-4"><span class="font-bold">Kategori:</span>{{ $product->category_id}}</p>
                    <p class="text-gray-800 dark:text-gray-300 font-bold mt-4"><span class="font-bold">Harga:</span>{{ $product->formatted_price }}</p>
                    <a href="#" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block"><i class="fa fa-shopping-cart mr-2"></i>Pesan</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
