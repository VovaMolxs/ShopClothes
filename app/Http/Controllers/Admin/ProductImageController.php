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
    /*public function store(Request $request)
    {
        if($request->hasFile('product_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('product_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);

            //Compress Image Code Here

            return redirect('ROUTE_HERE')->with('success', "Image uploaded successfully.");
        }
    }*/
}
