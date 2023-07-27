<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::latest()->paginate(10);
        return view('admin.products.products', compact('products'))
            ->with('i', (request()->input('page', default: 1) - 1) * 5);

    }


    public function create()
    {
        $categories = Categories::where('parent_id', '!=', '')->get();

        return view('admin.products.add_products', compact('categories'));
    }


    public function store(Request $request)
    {


        $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:3",
            "regular_price" => "required|numeric|min:1",
            "promotional_price" => "required|numeric|min:1",
            "currency" => "required|min:1",
            "tax_rate" => "required|numeric|min:1",
            "width" => "required|numeric|min:1",
            "height" => "required|numeric|min:1",
            "weight" => "required|numeric|min:1",
            "shipping_fees" => "required|numeric|min:1",
            "status" => "required",
            "link_image" => "image|nullable|max:1999",
            "category_id" => "required",
            "tags" => "required|min:3",
        ]);


        $pathToImage = preg_replace('/\bpublic\//', '', ProductImageController::update($request));


                Products::create([
                    "title" => $request['title'],
                    "description" => $request['description'],
                    "regular_price" => $request['regular_price'],
                    "promotional_price" => $request['promotional_price'],
                    "currency" => $request['currency'],
                    "tax_rate" => $request['tax_rate'],
                    "width" => $request['width'],
                    "height" => $request['height'],
                    "weight" => $request['weight'],
                    "shipping_fees" => $request['shipping_fees'],
                    "status" => $request['status'],
                    "link_image" => $pathToImage,
                    "category_id" =>$request['category_id'],
                    "tags" => $request['tags'],
                ]);


        return redirect()->route('products.index')->with('success', 'Products added');
    }


    public function show(Products $products)
    {
        //
    }


    public function edit(Products $products, $id)
    {
        $categories = Categories::all();
        $products = Products::find($id);
        return view('admin.products.edit_products', compact('products', 'categories'));
    }

    public function update(Request $request, $id, Products $products)
    {
        $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:3",
            "regular_price" => "required|numeric|min:1",
            "promotional_price" => "required|numeric|min:1",
            "currency" => "required|min:1",
            "tax_rate" => "required|numeric|min:1",
            "width" => "required|numeric|min:1",
            "height" => "required|numeric|min:1",
            "weight" => "required|numeric|min:1",
            "shipping_fees" => "required|numeric|min:1",
            "status" => "required",
            "link_image" => "image|nullable|max:1999",
            "older_link_image" => 'required|min:10|max:20',
            "category_id" => "required",
            "tags" => "required|min:3",
        ]);
        if ($request->hasFile('link_image')) {
            $pathToImage = preg_replace('/\bpublic\//', '', ProductImageController::update($request));
            //сделать удаление старой картинки из хранилища
        } else {
            $pathToImage = $request->get('older_link_image');
        }

        $products = Products::find($id)->update([
            "title" => $request['title'],
            "description" => $request['description'],
            "regular_price" => $request['regular_price'],
            "promotional_price" => $request['promotional_price'],
            "currency" => $request['currency'],
            "tax_rate" => $request['tax_rate'],
            "width" => $request['width'],
            "height" => $request['height'],
            "weight" => $request['weight'],
            "shipping_fees" => $request['shipping_fees'],
            "status" => $request['status'],
            "link_image" => $pathToImage,
            "category_id" =>$request['category_id'],
            "tags" => $request['tags'],
        ]);

        return redirect()->route('products.index')->with('success', 'Products update');
    }

    public function destroy(Products $products)
    {
        //
    }
}
