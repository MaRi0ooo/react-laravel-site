@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="form-container">
        <div class="create-header">
            <h1>Add a New Product</h1>
        </div>
        <form action="{{ route('order-product.update', $orderProduct->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="create-input-block">
                <label for="name">Order ID</label>
                <select>
                    @foreach($orders as $order)
                    <option {{$orderProduct->order_id == $order->id ? 'selected' : ''}} value="{{ $order->id }}">{{ $order->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-input-block">
                <label for="name">Product</label>
                <select>
                    @foreach($products as $product)
                    <option {{$orderProduct->product_id == $product->id ? 'selected' : ''}} value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-input-block">
                <label for="name">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="{{$orderProduct->quantity}}" required>
            </div>
            <button class="addProductButton" type="submit">Add Product</button>
        </form>
    </div>
</div>
@endsection