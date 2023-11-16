<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::included()->filter()->sort()->get();
       return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|max:100',
            'candidate_id' => 'required',

        ]);

        $categories=Category::create($request->all());

        return $categories;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)//si se pasa $id se utiliza la comentada
    {
        $category = Category::included()->findOrFail($category);
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'descripcion' => 'required|max:100',
            'candidate_id' => 'required',


        ]);

        $category->update($request->all());

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $category;
    }
}
