<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Riwayat Pesanan
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Nomor Pesanan</th>
                    <th class="py-2">Alamat</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Total Harga</th>
                    <th class="py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $order->number }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $order->address }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $order->status }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $order->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout> 