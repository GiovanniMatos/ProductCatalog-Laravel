<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <header class="bg-blue-500 p-8">
        <div class="container mx-auto">
            <h1 class="text-center text-3xl font-semibold">Products</h1>
            <nav class="flex justify-center">
                <ul class="flex space-x-4">
                    <li>
                        <a class="text-gray-800 hover:text-gray-600" href="{{ route('register') }}">Register</a>
                    </li>
                    <li>
                        <a class="text-gray-800 hover:text-gray-600" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container mx-auto mt-4">
        <div class="flex flex-wrap -mx-4">
            @foreach ($products as $product)
                <div class="w-1/4 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $product->img_url }}" class="w-full h-48 object-cover" alt="{{ $product->name }}">
                        <div class="p-4">
                            <h5 class="text-lg font-semibold">{{ $product->name }}</h5>
                            <p class="text-gray-600">{{ $product->description }}</p>
                            <p class="text-gray-800">R$ {{ $product->price }}</p>
                            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 inline-block">View Details</a>
                        </div>
                    </div>
                </div>
                @if ($loop->iteration % 4 == 0)
                    </div><div class="flex flex-wrap -mx-4">
                @endif
            @endforeach
        </div>
    </div>

</body>
</html>