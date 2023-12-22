@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="form-container">
        <div class="create-header">
            <h1>Add a New Product</h1>
        </div>
        <form action="{{ route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="create-input-block">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{$product->name}}" required>
            </div>
            <div class="create-input-block">
                <label for="tome">Volume/Description</label>
                <input type="text" id="tome" name="tome" value="{{$product->tome}}" required>
            </div>
            <div class="create-input-block">
                <label for="image">Select Image</label>
                <select name="image_url" id="image_url" required>
                    @foreach($imagePaths as $imagePath)
                    <option {{ $imagePath==$product->image_url ? 'selected' : ''}} value="{{ $imagePath }}">{{$imagePath
                        }}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-input-block">
                <label for="category_id">Select Category</label>
                <select name="category_id" id="category_id" required>
                    @foreach($categories as $category)
                    <option {{ $category->id == $product->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{$category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-input-block">
                <label for="status">Select Status</label>
                <div class="radio-group">
                    <div>
                        <label for="in_stock">
                            <input {{ $product->status == 'Немає в наявності' ? '' : 'checked'}} type="radio" id="in_stock" name="status" value="В наявності" required>
                            В наявності
                        </label>
                    </div>
                    <div>
                        <label for="out_of_stock">
                            <input {{ $product->status == 'Немає в наявності' ? 'checked' : ''}} type="radio" id="out_of_stock" name="status" value="Немає в наявності" required>
                            Немає в наявності
                        </label>
                    </div>
                </div>
            </div>
            <div class="create-input-block">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="{{$product->price}}" required>
            </div>
            <button class="addProductButton" type="submit">Add Product</button>
        </form>
    </div>
</div>
@endsection