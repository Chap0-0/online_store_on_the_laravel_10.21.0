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
                <p class="text-xl text-center text-blue-500 ">{{ $category->title }}</p>
            @endforeach
        </div>
        </div>

    </main>
</body>

</html>
