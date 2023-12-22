@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="form-container">
        <div class="create-header">
            <h1>Add a New Order</h1>
        </div>
        <form action="{{ route('order.store')}}" method="post">
            @csrf
            <button class="addProductButton" type="submit">Add Order</button>
        </form>
    </div>
</div>
@endsection