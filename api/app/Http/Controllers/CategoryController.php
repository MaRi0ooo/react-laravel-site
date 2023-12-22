<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function indexView()
    {
        $categories = Category::all();
        return view("category.category", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("category.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;

        if (!is_null($request)) {
            $category->name = $request->name ? $request->name : "";
            $category->save();
            return response()->json(["SUCCESS" => "Category created"], 200);
        } else {
            return response()->json(["ERROR" => "Category not created"], 404);
        }
    }

    public function storeView(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
        ]);

        Category::create($data);

        $categories = Category::all();
        return view("category.category", ["categories" => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!empty($category)) {
            return response()->json($category, 200);
        } else {
            return response()->json(["ERROR" => "Category not found"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view("category.edit", ["category" => $category]);
    }

    public function editView(string $id)
    {
        $category = Category::find($id);
        return view("category.edit", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if (!empty($category)) {
            $category->name = $request->name ? $request->name : $category->name;
            $category->save();
            return response()->json(["SUCCESS" => "Category updated"], 200);
        } else {
            return response()->json(["ERROR" => "Category not found"], 404);
        }
    }

    public function updateView(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name ? $request->name : $category->name;
        $category->save();

        $categories = Category::all();
        return view("category.category", ["categories" => $categories]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Category::where("id", $id)->exists()) {
            $category = Category::find($id);
            $category->delete();
            return response()->json(["SUCCESS" => "Category deleted"], 202);
        } else {
            return response()->json(["ERROR" => "Category not found"], 404);
        }
    }

    public function destroyView(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        $categories = Category::all();
        return view("category.category", ["categories" => $categories]);
    }
}
