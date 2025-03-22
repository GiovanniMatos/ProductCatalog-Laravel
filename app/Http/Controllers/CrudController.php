<?php

namespace App\Http\Controllers;

use App\Models\DashboardProduct;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        DashboardProduct::create([
            "name" => $request->name,
            "description" => $request->description,
            "img_url" => $request->img_url,
            "price" => $request->price
        ]);
        return redirect('/dashboard')->with('success', 'Product add!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Não utilizado, pode ser removido
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardProduct $dashboardProduct)
    {
        // Não utilizado, pode ser removido
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardProduct $product)
    {
        return view('edit_product', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardProduct $product)
    {
        $product->name = $request->name;
        $product->img_url = $request->img_url;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('/dashboard')->with('success', 'Product update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardProduct $product)
    {
        $product->delete();
        return redirect('/dashboard')->with('success', 'Product delete!');
    }
}