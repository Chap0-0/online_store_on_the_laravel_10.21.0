<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnliShop</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Шапка страницы -->
    @include('layouts.navigation')
    <main>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6">
            @foreach ($products as $product)
                <div class="p-5 overflow-hidden text-center bg-white border border-gray-300 rounded shadow-md">
                    <a href="/product/{{ $product->type_id }}">
                        <img src="{{ $product->main_image }}" alt="{{ $product->name }}"
                            class="flex-1 w-40 mx-auto my-auto ">
                        <div class="p-4">
                            <p class="block mb-2 text-lg font-semibold text-gray-900">{{ $product->name }}
                                {{ $product->name_type }}</p>
                            <p class="block mb-2 text-lg font-semibold text-gray-900">{{ $product->price }} руб.</p>
                        </div>
                    </a>
                    <button class="w-48 h-12 font-semibold text-white bg-blue-400 rounded"
                        onclick="addToCart({{ $product->type_id }})">Добавить в корзину</button>
                </div>
            @endforeach
        </div>
    </main>
    <script>
        function addToCart(idProductType) {
            axios.post('/add-to-cart/' + idProductType)
                .then(function(response) {
                    // В этой функции можно обновить информацию о корзине на странице, если это необходимо
                })
                .catch(function(error) {
                    console.error('Ошибка при добавлении в корзину', error);
                });
        }
    </script>
</body>

</html>
