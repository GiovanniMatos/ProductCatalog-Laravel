<?php

namespace App\Http\Controllers;

use App\Models\DashboardProduct;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $products = DashboardProduct::all();
        return view('welcome', ['products' => $products]);
    }

    public function dashboard()
    {
        $products = DashboardProduct::all();
        return view('dashboard', ['products' => $products]);
    }

    public function create(Request $request)
    {
        DashboardProduct::create([
            "name" => $request->name,
            "description" => $request->description,
            "img_url" => $request->img_url,
            "price" => $request->price,
        ]);
        return redirect('/dashboard')->with('success', 'Product added successfully!');
    }

    public function edit(DashboardProduct $product)
    {
        return view('edit_product', ['product' => $product]);
    }

    public function update(Request $request, DashboardProduct $product)
    {
        $product->name = $request->name;
        $product->img_url = $request->img_url;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('/dashboard')->with('success', 'Product updated successfully!');
    }

    public function destroy(DashboardProduct $product)
    {
        $product->delete();
        return redirect('/dashboard')->with('success', 'Product deleted successfully!');
    }
}