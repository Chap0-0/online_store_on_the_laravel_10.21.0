<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>Продукт</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Шапка страницы -->
    @include('layouts.navigation')
    <main class="max-w-2xl p-4 mx-auto ">
        <div class="flex flex-wrap p-4 bg-white rounded-lg shadow-md">
            <div class="w-full sm:w-1/2">
                <img id="main_image" src="{{ $productType->main_image }}"
                    alt="{{ $product->name }} {{ $productType->name_type }}" class="object-contain w-80 h-96">
            </div>
            <div class="w-full sm:w-1/2">
                <h2 class="text-3xl font-bold">{{ $product->name }} {{ $productType->name_type }}</h2>
                <div class="text-lg">
                    @foreach ($selectProperties as $selectProperty)
                        <p class="font-bold">{{ $selectProperty->property_select_name }}:</p>
                        @foreach ($allProperties as $property)
                            @if ($property->property_value == $selectProperty->property_select_value)
                                <p id="property_select_value" class="text-red-600">{{ $property->property_value }}</p>
                            @else
                                <button class="px-4 py-2 border border-gray-600 border-solid change-property"
                                    data-product-type="{{ $productType->id }}"
                                    data-property-value="{{ $property->property_value }}"
                                    data-select-property_id="{{ $selectProperty->property_id }}">{{ $property->property_value }}</button>
                            @endif
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
        <p class="mt-4 text-xl">{{ $product->description }}</p>
        <div class="mt-4">
            <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-md">
                <p class="text-2xl font-bold" id="price">Цена: {{ $productType->price }} руб.</p>
                <button onclick="addToCart({{ $productType->id }})"
                    class="px-4 py-2 text-lg text-white bg-blue-500 rounded-lg hover:bg-blue-700">Добавить в
                    корзину</button>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('change-property')) {
                const productTypeId = event.target.getAttribute('data-product-type');
                const propValue = event.target.getAttribute('data-property-value');
                const selectProp = event.target.getAttribute('data-select-property_id');

                fetch(`/change-product-type/${productTypeId}/${selectProp}/${propValue}`)
                    .then(response => response.json())
                    .then(data => {
                        const newUrl = '/product/' + data.newProductId;
                        history.pushState(null, null, newUrl);
                        location.reload();
                    });
            }
        });
    </script>



</body>

</html>
