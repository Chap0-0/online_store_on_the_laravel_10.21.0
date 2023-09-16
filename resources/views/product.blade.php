<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <title>Продукт</title>
</head>
<body>
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
    <div class="product">
        <div class="image">
            <img src="{{ $product->main_image }}" alt="{{ $product->name }}" class="product-image">
        </div>
        <div class="product-info">
            <h2 class="product-name">{{ $product->name }}</h2>
            <div class="product-parameters">
                @foreach($product_parameters as $product_parameter)
                    <p class="name-parameter">{{ $product_parameter->name_parameter }}:
                        <p class="value-parameter">{{ $product_parameter->value_parameter }}            
                            @foreach($alter_product_parameters as $alter_product_parameter)
                                @if($alter_product_parameter->name_parameter == $product_parameter->name_parameter)
                                    <a class="alter_value-parameter" href="/product/{{ $product->id }}/{{ $alter_product_parameter->product_price_id}}">{{ $alter_product_parameter->value_parameter }}</a>
                                @endif
                            @endforeach
                        </p>
                    </p>
                @endforeach
            </div>
        </div>
            <form class="price">
                <p class="product-price">Цена: {{ $product->price }} руб.</p>
                <button class="add-to-cart-button">Добавить в корзину</button>
            </form>
    </div>
    <p class="product-description">{{ $product->description }}</p>
</main>

</body>
</html>