<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnliShop</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Шапка страницы -->
    @include('layouts.navigation')
    <main>
        <div class='categories'>
            @foreach ($categories as $category)
                <p class="text-xl text-center text-blue-500 ">{{ $category->name }}</p>
                <div class="product-grid">
                    @foreach ($products as $product)
                        @if ($product->category_name === $category->name)
                            <div class="product-card">
                                <a href="/product/{{ $product->id }}/{{ $product->price_id }}" class="link-product">
                                    <img src="{{ $product->main_image }}" alt="{{ $product->name }}"
                                        class="product-image">
                                    <div class="product-details">
                                        <h2 class="product-title">{{ $product->name }}</h2>
                                </a>
                                <p class="product-description">{{ $product->description }}</p>
                                <p class="product-price">Цена: {{ $product->price }} руб.</p>
                                <button class="add-to-cart-button">Добавить в корзину</button>
                            </div>
                </div>
            @endif
            @endforeach
        </div>
        @endforeach
        </div>

    </main>
</body>

</html>
