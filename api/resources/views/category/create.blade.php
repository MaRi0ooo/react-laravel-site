@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="form-container">
        <div class="create-header">
            <h1>Add a New Product</h1>
        </div>
        <form action="{{ route('category.store')}}" method="post">
            @csrf
            <div class="create-input-block">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button class="addProductButton" type="submit">Add Product</button>
        </form>
    </div>
</div>
@endsection