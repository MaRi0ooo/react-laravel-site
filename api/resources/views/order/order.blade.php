@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">
        <h1>All Orders</h1>
        <a class="addButton" href="{{route('order.create')}}">+&nbsp;Add Order</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>
                    <form action="{{route('order.destroy', $order->id)}}" method="post">
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