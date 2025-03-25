<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Project</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .product-card {
            transition: box-shadow 0.2s ease-in-out;
        }
        .product-card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .product-image-container {
            position: relative;
            overflow: hidden;
        }
        .product-image-container img {
            transition: transform 0.3s ease-in-out;
        }
        .product-image-container:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50">

    <header class="bg-gradient-to-r from-blue-500 to-cyan-500 py-6 shadow-md">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <h1 class="text-white text-2xl font-semibold">🛍️ Shop Project</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li>
                        <a class="text-white hover:text-gray-200 transition duration-300" href="{{ route('register') }}">Register</a>
                    </li>
                    <li>
                        <a class="text-white hover:text-gray-200 transition duration-300" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Check Our Products</h2>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden product-card">
                        <div class="product-image-container">
                            <img src="{{ $product->img_url }}" class="w-full h-48 object-cover" alt="{{ $product->name }}">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm truncate mb-2">{{ $product->description }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-green-600 mb-3">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                            </div>
                            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-3 rounded transition duration-300">Ver Detalhes</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($products) === 0)
                <p class="text-center text-gray-500 mt-8">No product found.</p>
            @endif
        </div>
    </main>

    <footer class="bg-gray-200 py-4 text-center text-gray-600 text-sm mt-100">
        <div class="container mx-auto px-4">
            &copy; {{ date('Y') }} Shop Project. All rights reserved.
        </div>
    </footer>

</body>
</html>