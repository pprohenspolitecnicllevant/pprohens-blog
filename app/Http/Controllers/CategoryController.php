<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // $categories = Category::all();
        // return view('category.index', compact('categories'));
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        Category::create($request->all());
        return redirect()->route('category.index')->with('success', __('Categoria creada correctament'));

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
    public function edit(Category $category):View
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category):RedirectResponse
    {
        $category->update($request->all());
        return redirect()->route('category.index')->with('success', __('Categoria editada correctament'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category):RedirectResponse
    {
        if ($category->posts->count() > 0) {
            return redirect()->route('category.index')->with('error', __('ERROR: La categoria està vinculada a posts'));
        }
        else {
            $category->delete();
            return redirect()->route('category.index')->with('success', __('Categoria eliminada correctament'));
        }

    }
}
