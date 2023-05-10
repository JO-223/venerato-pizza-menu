<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate that the total_price value is present in the request
        $request->validate([
            'total_price' => 'required|integer'
        ]);

        // Get the cart data from the request and decode it from a JSON string to an array
        $cart = json_decode($request->input('cart'), true);

        // Create a new order
        $order = new Orders();
        $order->status = 'pending';
        $order->total_price = $request->input('total_price');
        $order->save();

        // Associate the pizzas with the order
        foreach ($cart as $item) {
            $order->pizzas()->attach($item['pizza']['id'], ['quantity' => $item['quantity']]);
        }

        return view('order', ['order' => $order]);
    }

    public function show($id, Request $request)
    {
        // retrieve the order by id
        $order = Orders::findOrFail($id);

        return response()->json(['success' => true]);
    }
    public function apiIndex()
    {
        $orders = Orders::all();
        return response()->json($orders);
    }

    public function apiUpdate(Request $request, $id)
    {
        $order = Orders::find($id);
        if ($order) {
            $order->status = $request->input('status');
            $order->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }
}
