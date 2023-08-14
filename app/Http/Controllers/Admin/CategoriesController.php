<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Services\admin\CategoriesService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public $service;

    public function __construct(CategoriesService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $categories = Categories::where('parent_id', '')->get();
        return view('admin.categories.categories', compact('categories'));
    }


    public function create()
    {

        return view('admin.categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (empty($request->get('parent_id'))) {
            $this->service->storeParent($request);
        } else {
            $this->service->storeChild($request);
        }
        return redirect()->route('categories.index')->with('success', 'Categories added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    public function edit(Categories $categories, $id)
    {
        $categories = Categories::find($id)->childrens->all();

        return view('admin.categories.categories_child', compact('categories', 'id'));
    }




    public function update(Request $request, $id, Categories $categories)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'slug' => 'required|min:3'
        ]);

        $categories = Categories::find($id);
        $categories->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categories update');
    }

    public function destroy($id)
    {

        //dd($id);
        Categories::deleted($id);
        return redirect()->route('categories.index')->with('success', 'Categories deleted');
    }

}
