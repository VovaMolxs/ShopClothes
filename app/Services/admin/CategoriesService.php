<?php

namespace App\Services\admin;

use App\Models\Categories;

class CategoriesService
{
    public function storeChild($request) {
        $data = $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|regex:/[A-aZ-z0-9]/i|min:3',
            'desc_title' => 'required|min:3',
            'h1_title' => 'required|min:3',
            'parent_id' => 'required|min:1',
        ]);
        //dd($data['desc_title']);
        Categories::create($data);


    }

    public function storeParent($request) {
        $data = $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|regex:/[A-aZ-z0-9]/i|min:3',
            'desc_title' => 'required|min:3',
            'h1_title' => 'required|min:3'
        ]);
        //dd($data);
        Categories::create($data);
    }
}
