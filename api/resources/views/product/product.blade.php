@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">
        <h1>All Products</h1>
        <a class="addButton" href="{{route('product.create')}}">+&nbsp;Add Product</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Tome</th>
                <th>Category</th>
                <th>Status</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img src="{{$product->image_url}}" alt="image"></td>
                <td>{{$product->name}}</td>
                <td>{{$product->tome}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->status}}</td>
                <td>₴ {{$product->price}}</td>
                <td>
                    <a class="editButton" href="{{route('product.edit', $product->id)}}">Edit</a>
                    <form action="{{route('product.destroy', $product->id)}}" method="post">
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