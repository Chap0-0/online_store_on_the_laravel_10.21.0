<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnliShop</title>
</head>
<body>
    <!-- Шапка страницы -->
    <header>
        <div class="Panel">
            <a class="logo">OnliShop</a>
            <a href="/catalog">Каталог</a>
            <a href="/cart">Корзина</a>
            <a class="profile" href="/profile">Профиль</a>
        </div>
    </header>
    <main>
    <!-- Список товаров и информация о них -->
    @foreach($products as $product)
    <div class="product-card">
        <img src="{{ $product->image_url }}" alt="{{ $product->image_url }}" class="product-image">
        <div class="product-details">
            <h2 class="product-title">{{ $product->name }}</h2>
            <p class="product-description">{{ $product->description }}</p>
            <p class="product-price">Цена: {{ $product->price }} руб.</p>
            <button class="add-to-cart-button">Добавить в корзину</button>
        </div>
    </div>
    @endforeach
    </main>
    <style>
        body{
            background-color: #f5f5f5;
        }
        header {
        background-color: #B17AFF;
        color: #FFFFFF;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        width: 90%;
        margin: 0 auto;
        }

        header a {
        color: #FFFFFF; 
        text-decoration: none;
        margin: 0 10px; 
        }
        .Panel {
        display: flex;
        justify-content: space-between; 
        align-items: center; 
        font-size:22px;
        }
        .logo {
        margin-right: auto;
        font-size:32px;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        }
        .profile {
        margin-left: 10%;
        }

        main{
        width: 94%;
        margin: 0 auto;
        }
        .product-card {
        display: flex;
        border: 1px solid #e1e1e1;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        height:200px;
        margin: 20px;
        background-color: #fff;
        }

        .product-image {
        width: 150px;
        height: auto; 
        object-fit: cover;
        border-right: 1px solid #e1e1e1;
        }

        .product-details {
        padding: 20px;
        }

        .product-title {
        font-size: 1.25rem;
        margin: 0;
        color: #333;
        }

        .product-description {
        font-size: 0.875rem;
        margin: 10px 0;
        color: #666;
        }

        .product-price {
        font-size: 1.25rem;
        margin: 10px 0;
        color: #333;
        }

        .add-to-cart-button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }

        .add-to-cart-button:hover {
        background-color: #0056b3;
        }
        
    </style>
</body>
</html>
