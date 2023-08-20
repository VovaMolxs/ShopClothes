<?php

namespace App\Services;

use App\Models\Categories;
use App\Models\Products;

class IndexService
{
    public function products($slug) {
        if (!empty($slug)) {
            $breadcrumb = Categories::where('slug', $slug)->firstOrFail();

            if (!empty($breadcrumb->childrens)) {
                //уровень категорий (работает кривовато)
                if ($breadcrumb->parent_id == '') {
                    //dd($breadcrumb->parent_id);
                    $products = Products::join('categories', 'products.category_id', '=',  'categories.id')
                        ->where('categories.parent_id', $breadcrumb->id)
                        ->paginate(12);

                    $category = $breadcrumb->childrens;
                    return compact('breadcrumb', 'products', 'category');
                } else {
                    $products = Products::join('categories', 'products.category_id', '=',  'categories.id')
                        ->where('categories.id', $breadcrumb->id)
                        ->paginate(12);

                    $category = $breadcrumb->childrens;
                    return compact('breadcrumb', 'products', 'category');
                }
            }
        } else {
            $category = Categories::where('parent_id', '')->get();
            $products = Products::where('status', '=', 'active')->paginate(12);

            return compact('category', 'products');
        }

}
}
