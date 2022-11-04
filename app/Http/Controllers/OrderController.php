<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product','costumer'])->get();
        return view('pages.order.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $costumers = Costumer::all();
        return view('pages.order.create', compact('products','costumers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'costumer' => 'required',
            'product' => 'required',
            'qty' => 'required',
            'total' => 'required'
        ]);

        $data = [
            'costumer_id' => $request->costumer,
            'product_id' => $request->product,
            'qty' => $request->qty,
            'total' => $request->total
        ];

        Order::create($data);

        return redirect()->route('order.index')->with('success', 'Data berhasil disimpan!');
    }
}
