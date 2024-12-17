<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index($order_id)
    {
        $order = Order::find($order_id);

        // Tampilkan halaman pembayaran
        return view('payment', compact('order'));
    }

    public function store(Request $request, $order_id)
    {
        // Proses pembayaran
        // ...

        // Update status order
        $order = Order::find($order_id);
        $order->status = 'paid';
        $order->save();

        // Redirect ke halaman sukses
        return redirect()->route('success');
    }
}
