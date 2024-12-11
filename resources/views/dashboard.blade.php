<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Product List</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            <div class="card bg-white dark:bg-gray-700 shadow-md rounded-lg overflow-hidden">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top w-full h-48 object-cover">
                                </a>
                                <div class="p-4">
                                <a href="{{ route('products.show', $product->id) }}">
                                        <h5 class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $product->name }}</h5>
                                    </a>
                                    <p class="text-gray-600 dark:text-gray-400 mb-2"><span class="font-bold">Deskripsi:</span>{{ $product->description }}</p>
                                    <p class="text-gray-800 dark:text-gray-300 font-bold mt-4"><span class="font-bold">Harga:</span> {{ $product->formatted_price }}</p>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block"><i class="fa fa-shopping-cart mr-2"></i>Pesan</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
