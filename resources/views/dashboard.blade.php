<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>CRUD</title>
</head>
<body>
    <header class="flex items-center pt-4 w-full justify-between mb-4">
        <h2 class="mr-3 pl-8 font-bold text-lg">Welcome {{ Auth::user()->name }}!</h2>
        <form action="{{ route('logout') }}" method="POST" class="mr-8">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Exit
            </button>
        </form>
    </header>
    <hr>
    <form action="/create" method="POST">
        @csrf
        <div class="p-8">
            <h2 class="uppercase tracking-wide text-sm font-semibold text-indigo-500">Product Catalog</h2>

            <div class="flex mt-1">
                <div class="w-1/2 mr-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Nome do produto">
                </div>
                <div class="w-1/2 ml-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                    <input class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 focus:outline-none focus:shadow-outline" name="img_url" type="text" placeholder="Arraste uma imagem publica">
                </div>
            </div>

            <div class="mt-1">
                <label class="block text-gray-700 text-sm font-bold" for="description">Description</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" name="description" placeholder="Descrição do produto"></textarea>
            </div>

            <div class="mt-1">
                <label class="block text-gray-700 text-sm font-bold" for="price">Price</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-2 text-gray-700 focus:outline-none focus:shadow-outline" name="price" type="number" placeholder="Preço do produto">
            </div>

            <div class="mt-1">
                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Send
                </button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td><img src="{{$product->img_url}}" style="max-width: 100px; max-height: 100px;"></td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="/editar/{{$product->id}}" class="btn btn-warning">Edit</a>
                    <a href="/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>