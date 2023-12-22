@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">
        <h1>All Categories</h1>
        <a class="addButton" href="{{route('category.create')}}">+&nbsp;Add Category</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a class="editButton" href="{{route('category.edit', $category->id)}}">Edit</a>
                    <form action="{{route('category.destroy', $category->id)}}" method="post">
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