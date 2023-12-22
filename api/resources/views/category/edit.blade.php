@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="form-container">
        <div class="create-header">
            <h1>Add a New Product</h1>
        </div>
        <form action="{{ route('category.update', $category->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="create-input-block">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{$category->name}}" required>
            </div>
            <button class="addProductButton" type="submit">Add Product</button>
        </form>
    </div>
</div>
@endsection