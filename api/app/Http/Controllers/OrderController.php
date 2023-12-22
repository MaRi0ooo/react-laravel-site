<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders, 200);
    }

    public function indexView()
    {
        $orders = Order::all();
        return view("order.order", ["orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        return view("order.create", ["orders" => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order;

        if (!is_null($request)) {
            $order->save();
            return response()->json(["SUCCESS" => "Order created", "id" => $order->id], 200);
        } else {
            return response()->json(["ERROR" => "Order not created"], 404);
        }
    }

    public function storeView(Request $request)
    {
        Order::create();
        $orders = Order::all();
        return view("order.order", ["orders" => $orders]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);

        if (!empty($order)) {
            return response()->json($order, 200);
        } else {
            return response()->json(["ERROR" => "Order not found"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        return view("order.edit", ["order" => $order]);
    }

    public function editView(string $id)
    {
        $order = Order::find($id);
        return view("order.edit", ["order" => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if (!empty($order)) {
            $order->save();
            return response()->json(["SUCCESS" => "Order updated"], 200);
        } else {
            return response()->json(["ERROR" => "Order not found"], 404);
        }
    }

    public function updateView(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->save();

        $orders = Order::all();
        return view("order.order", ["orders" => $orders]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Order::where("id", $id)->exists()) {
            $order = Order::find($id);
            $order->delete();
            return response()->json(["SUCCESS" => "Order deleted"], 202);
        } else {
            return response()->json(["ERROR" => "Order not found"], 404);
        }
    }

    public function destroyView(string $id)
    {
        $order = Order::find($id);
        $order->delete();
        $orders = Order::all();
        return view("order.order", ["orders" => $orders]);
    }
}
