<?php

namespace App\Http\Controllers\Index\Products;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        $categories = Categories::all();
        $products = Products::find($id);
        $comments = Reviews::join('products', 'reviews.product_id', '=',  'products.id')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->get(['reviews.*', 'products.id', 'users.name', 'users.id'])->where('product_id', $id);

        return view('products.products_item', compact('products', 'categories', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
