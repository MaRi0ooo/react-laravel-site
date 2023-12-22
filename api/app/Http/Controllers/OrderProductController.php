<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;


class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderProducts = OrderProduct::all();
        return response()->json($orderProducts, 200);
    }

    public function indexView()
    {
        $orderProducts = OrderProduct::all();
        return view("order-product.order-product", ["orderProducts" => $orderProducts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orderProducts = OrderProduct::all();
        $products = Product::all();
        $orders = Order::all();
        return view("order-product.create", ["orderProducts" => $orderProducts, "products" => $products, "orders" => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderProduct = new OrderProduct;

        if (!is_null($request)) {
            if (!Order::where('id', $request->order_id)->exists()) {
                return response()->json(["ERROR" => "ORDER CREATION ERROR: Order ID not found"], 404);
            }
            $orderProduct->order_id = $request->order_id;

            if (!Product::where('id', $request->product_id)->exists()) {
                return response()->json(["ERROR" => "ORDER CREATION ERROR: Product ID not found"], 404);
            }
            $orderProduct->product_id = $request->product_id;

            $orderProduct->quantity = $request->quantity ? $request->quantity : 0;
            $orderProduct->save();

            return response()->json(["SUCCESS" => "OrderProduct created"], 200);
        } else {
            return response()->json(["ERROR" => "OrderProduct not created"], 404);
        }
    }

    public function storeView(Request $request)
    {
        $data = $request->validate([
            "order_id" => ["required", "integer"],
            "product_id" => ["required", "integer"],
            "quantity" => ["required", "integer"],
        ]);

        OrderProduct::create($data);
        $orderProducts = OrderProduct::all();
        return view("order-product.order-product", ["orderProducts" => $orderProducts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderProduct = OrderProduct::find($id);

        if (!empty($orderProduct)) {
            return response()->json($orderProduct, 200);
        } else {
            return response()->json(["ERROR" => "OrderProduct not found"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orderProduct = OrderProduct::find($id);
        $products = Product::all();
        $orders = Order::all();
        return view("order-product.edit", ["orderProduct" => $orderProduct, "products" => $products, "orders" => $orders]);
    }

    public function editView(string $id)
    {
        $orderProduct = OrderProduct::find($id);
        return view("order-product.edit", ["orderProduct" => $orderProduct]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderProduct = OrderProduct::find($id);

        if (!empty($orderProduct)) {
            if (Order::where('id', $request->order_id)->exists()) {
                $orderProduct->order_id = $request->order_id;
            }

            if (Product::where('id', $request->product_id)->exists()) {
                $orderProduct->product_id = $request->product_id;
            }

            $orderProduct->quantity = $request->quantity ? $request->quantity : $orderProduct->quantity;
            $orderProduct->save();

            return response()->json(["SUCCESS" => "OrderProduct updated"], 200);
        } else {
            return response()->json(["ERROR" => "OrderProduct not found"], 404);
        }
    }

    public function updateView(Request $request, string $id)
    {
        $orderProduct = OrderProduct::find($id);
        if (Order::where('id', $request->order_id)->exists()) {
            $orderProduct->order_id = $request->order_id;
        }

        if (Product::where('id', $request->product_id)->exists()) {
            $orderProduct->product_id = $request->product_id;
        }

        $orderProduct->quantity = $request->quantity ? $request->quantity : $orderProduct->quantity;
        $orderProduct->save();

        $orderProducts = OrderProduct::all();
        return view("order-product.order-product", ["orderProducts" => $orderProducts]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (OrderProduct::where("id", $id)->exists()) {
            $orderProduct = OrderProduct::find($id);
            $orderProduct->delete();
            return response()->json(["SUCCESS" => "OrderProduct deleted"], 202);
        } else {
            return response()->json(["ERROR" => "OrderProduct not found"], 404);
        }
    }

    public function destroyView(string $id)
    {
        $orderProduct = OrderProduct::find($id);
        $orderProduct->delete();
        $orderProducts = OrderProduct::all();
        return view("order-product.order-product", ["orderProducts" => $orderProducts]);
    }
}
