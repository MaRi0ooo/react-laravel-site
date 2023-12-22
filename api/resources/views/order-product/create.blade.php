@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="form-container">
        <div class="create-header">
            <h1>Add a New Product</h1>
        </div>
        <form action="{{ route('order-product.store')}}" method="post">
            @csrf
            <div class="create-input-block">
                <label for="name">Order ID</label>
                <select id="order_id" name="order_id">
                    @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-input-block">
                <label for="name">Product</label>
                <select id="product_id" name="product_id">
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-input-block">
                <label for="name">Quantity</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
            <button class="addProductButton" type="submit">Add Product</button>
        </form>
    </div>
</div>
@endsection