<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Pembayaran
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Informasi Order -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Informasi Order</h2>
            <p>Nama: {{ $order->user->name }}</p>
            <p>Alamat: {{ $order->address }}</p>
            <p>Total: Rp{{ number_format($order->total, 0, ',', '.') }}</p>
        </div>

        <!-- Form Pembayaran -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Form Pembayaran</h2>
            <form action="{{ route('payment.store', ['order_id' => $order->id]) }}" method="POST">
                @csrf

                <!-- Metode Pembayaran -->
                <div class="mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <select 
                        name="payment_method" 
                        id="payment_method" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" 
                        required>
                        <option value="cod">Cash On Delivery (COD)</option>
                        <option value="bank_transfer">Transfer Bank</option>
                        <option value="credit_card">Kartu Kredit</option>
                    </select>
                    @error('payment_method')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                    <button 
                        type="submit" 
                        class="px-6 py-3 w-full bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none">
                        Bayar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>