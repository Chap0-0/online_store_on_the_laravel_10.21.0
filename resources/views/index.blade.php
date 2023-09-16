<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnliShop</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <!-- Шапка страницы -->
    <header>
        <div class="header-container">
            <a class="logo" href="/">OnliShop</a>
            <div class="search-bar">
                <input placeholder="Поиск продукта" class="search-input"/>
                <button class="search-button">Поиск</button>
            </div>
            <nav class="header-nav">
                <a href="/catalog">Каталог</a>
                <a href="/cart">Корзина</a>
                <a class="profile" href="/profile">Профиль</a>
            </nav>
        </div>
    </header>
    <main>
       <div class='categories'>
    @foreach($categories as $category)
        <h1 class="name-category">{{ $category->name }}</h1>
        <div class="product-grid">
            @foreach($products as $product)
                @if($product->category_name === $category->name)
                    <div class="product-card">
                        <a href="/product/{{ $product->id }}/{{ $product->price_id}}" class="link-product">
                            <img src="{{ $product->main_image }}" alt="{{ $product->name }}" class="product-image">
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
