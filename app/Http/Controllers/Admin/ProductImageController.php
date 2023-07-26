<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public static function update(Request $request): string
    {
        $path = $request->file('link_image')->store('public/product_image');
        return $path;
    }

}
