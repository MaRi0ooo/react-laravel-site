@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">
        <h1>All Order Products</h1>
        <a class="addButton" href="{{route('order-product.create')}}">+&nbsp;Add Order Product</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderProducts as $orderProduct)
            <tr>
                <td>{{$orderProduct->id}}</td>
                <td>{{$orderProduct->order_id}}</td>
                <td>{{$orderProduct->product->name}}</td>
                <td>{{$orderProduct->quantity}}</td>
                <td>
                    <a class="editButton" href="{{route('order-product.edit', $orderProduct->id)}}">Edit</a>
                    <form action="{{route('order-product.destroy', $orderProduct->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="deleteButton">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection