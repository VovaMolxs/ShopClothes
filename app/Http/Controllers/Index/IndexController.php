<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Services\IndexService;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public $service;

    public function __construct(IndexService $service)
    {
        $this->service = $service;
    }


    public function index() {
        //dd(Auth::user()->name);
        $productsBest = Products::orderBy('rating', 'desc')->get();
        $productsPopular = Products::where('status', 'active')->get();
        return view('index', compact('productsPopular', 'productsBest'));
    }

    public function products($slug = '') {

        return view('products.products', $this->service->products($slug));


    }
}
