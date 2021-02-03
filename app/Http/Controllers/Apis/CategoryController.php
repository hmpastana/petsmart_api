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
        return response()->json(Category::paginate(1), 200);
    }
    public function show($id)
    {
        $category = Category::find($id);
        $response['category'] = $category;
        $response['products'] = $category->products;
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'category' => 'required'
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
