<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;

class IndexController extends Controller
{
    public function index() {

        $products = Products::join('categories', 'products.category_id', '=',  'categories.id')->get(['products.*', 'categories.name']);
        return view('index', compact('products'));
    }
}
