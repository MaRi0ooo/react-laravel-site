<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function indexView()
    {
        $products = Product::all();
        return view("product.product", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $product = new Product;

        $folderPaths = ['images/manga', 'images/certificate'];
        $imagePaths = [];

        foreach ($folderPaths as $folderPath) {
            $files = glob(public_path($folderPath . '/*'));
            $folderImagePaths = array_map(function ($file) use ($folderPath) {
                return $folderPath . '/' . basename($file);
            }, $files);

            $imagePaths = array_merge($imagePaths, $folderImagePaths);
        }

        return view("product.create", compact('product', 'categories', 'imagePaths'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;

        if (!is_null($request)) {
            $product->name = $request->name ? $request->name : "";
            $product->image_url = $request->image_url ? $request->image_url : "";
            $product->tome = $request->tome ? $request->tome : "";
            $product->status = $request->status ? $request->status : "";
            $product->price = $request->price ? $request->price : 0;

            if (!Category::where('id', $request->category_id)->exists()) {
                return response()->json(["ERROR" => "PRODCUT CREATION ERROR: Category not found"], 404);
            }
            $product->category_id = $request->category_id;
            $product->save();

            return response()->json(["SUCCESS" => "Product Created"], 201);
        } else {
            return response()->json(["ERROR" => "Product not created"], 404);
        }
    }

    public function storeView(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "image_url" => ["required", "string"],
            "tome" => ["required", "string"],
            "category_id" => ["required", "integer"],
            "status" => ["required", "string"],
            "price" => ["required", "integer"],
        ]);

        Product::create($data);

        $products = Product::all();
        return view("product.product", ["products" => $products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!empty($product)) {
            return response()->json($product, 200);
        } else {
            return response()->json(["ERROR" => "Product not found"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $folderPaths = ['images/manga', 'images/certificate'];
        $imagePaths = [];

        foreach ($folderPaths as $folderPath) {
            $files = glob(public_path($folderPath . '/*'));
            $folderImagePaths = array_map(function ($file) use ($folderPath) {
                return $folderPath . '/' . basename($file);
            }, $files);

            $imagePaths = array_merge($imagePaths, $folderImagePaths);
        }

        $categories = Category::all();

        $product = Product::find($id);
        return view("product.edit", ["product" => $product, "imagePaths" => $imagePaths, "categories" => $categories]);
    }

    public function updateView(Request $request, string $id)
    {
        $request->validate([
            "name" => ["required", "string"],
            "image_url" => ["required", "string"],
            "tome" => ["required", "string"],
            "category_id" => ["required", "integer"],
            "status" => ["required", "string"],
            "price" => ["required", "integer"],
        ]);

        $editProduct = Product::find($id);
        $editProduct->update($request->all());

        $products = Product::all();
        return view("product.product", ["products" => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!empty($product)) {
            $product->name = $request->name ? $request->name : $product->name;
            $product->image_url = $request->image_url ? $request->image_url : $product->image_url;
            $product->tome = $request->tome ? $request->tome : $product->tome;
            $product->status = $request->status ? $request->status : $product->status;
            $product->price = $request->price ? $request->price : $product->price;

            if (Category::where('id', $request->category_id)->exists()) {
                $product->category_id = $request->category_id;
            }
            $product->save();

            return response()->json(["SUCCESS" => "Product updated"], 200);
        } else {
            return response()->json(["ERROR" => "Product not found"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::all();
        if (Product::where("id", $id)->exists()) {
            $product = Product::find($id);
            $product->delete();
            return response()->json(["ERROR" => "Product deleted"], 202);
        } else {
            return response()->json(["ERROR" => "Product not found"], 404);
        }
    }

    public function destroyView(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        $products = Product::all();
        return view("product.product", ["products" => $products]);
    }
}
