<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ URL('/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/product.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/create.css') }}">
</head>

<body>
    <div id="app">
        <main>
            <div class="navbar">
                <div class="logo">
                    <h1>ADMIN PANEL</h1>
                    <hr />
                </div>
                <nav class="nav-links">
                    <a class="nav-link {{ (Request::is('product') ? 'active' : '') }}" href="{{url('product')}}">Product</a>
                    <a class="nav-link {{ (Request::is('category') ? 'active' : '') }}" href="{{url('category')}}">Category</a>
                    <a class="nav-link {{ (Request::is('order') ? 'active' : '') }}" href="{{url('order')}}">Order</a>
                    <a class="nav-link {{ (Request::is('order-product') ? 'active' : '') }}" href="{{url('order-product')}}">Orders</a>
                </nav>
            </div>

            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>