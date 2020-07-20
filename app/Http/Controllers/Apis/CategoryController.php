<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::get(), 200);
    }
    public function show($id)
    {
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json(null, 404);
        }
        $category = Category::with('products')->findOrFail($id);
        $response = new CategoryResource($category, 200);
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $product = Category::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function delete(Request $request, Category $category)
    {
        $category->delete();
        return response()->json(null, 204);

    }

    public function products(Request $request, Category $category)
    {
        $products = $category->products;
        return response()->json($products,200);
    }
}
