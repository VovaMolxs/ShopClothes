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

        $products = Products::all();


        return view('index', compact('products'));
    }

    public function products($slug = '') {


        return view('products.products', $this->service->products($slug));


    }
}
