<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categories::latest()->paginate(10);
        return view('admin.categories.categories', compact('categories'))
            ->with('i', (request()->input('page', default: 1) - 1) * 5);
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
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'slug' => 'required|min:3'
        ]);

        Categories::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Categories added');

    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories, $id)
    {
        $categories = Categories::find($id);
        return view('admin.categories.categories_edit', compact('categories',));
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
        Categories::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Categories deleted');
    }
}
