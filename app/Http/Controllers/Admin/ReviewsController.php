<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;


class ReviewsController extends Controller
{

    public function index()
    {
        $reviews = User::join('reviews', 'users.id', '=',  'reviews.user_id')
            ->join('products', 'reviews.product_id', '=', 'products.id')
            ->get(['reviews.*', 'users.name', 'products.title'])
            ->paginate(12);




        return view('admin.reviews.reviews', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reviews::destroy($id);
        return redirect()->route('reviews.index')->with('success', 'Comment deleted');
    }
}
