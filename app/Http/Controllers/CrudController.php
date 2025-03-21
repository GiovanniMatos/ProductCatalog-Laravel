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
        echo"product add";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardProduct $dashboardProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardProduct $dashboardProduct)
    {
        $product_id = DashboardProduct::findOrFail($product_id);
        return view('edit_product', [ 'product' => $product_id ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardProduct $dashboardProduct)
    {
        $product = DashboardProduct::findOrFail($product_id);
        $product -> name = $new_data -> name;
        $product -> img_url = $new_data -> img_url;
        $product -> description = $new_data -> description;
        $product -> price = $new_data -> price;
        $product -> save();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardProduct $dashboardProduct)
    {
        $product = DashboardProduct::findOrFail($id_product);
        $product -> destroy($product);
        echo "Product deleted: ", $product -> nome;
        return redirect('/dashboard');
    }
}
