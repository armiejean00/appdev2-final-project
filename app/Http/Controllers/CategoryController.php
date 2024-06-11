<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
     
    public function index()
    {
        return Category::all();
    }

 
    public function store(CategoryRequest $request)
    {
    $category = Category::create($request->all());

    return response()->json($category, 201);
    }

   
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

  
   public function update(CategoryRequest $request, $id)
   {
   $category = Category::find($id);

   if (!$category) {
   return response()->json(['message' => 'Category not found'], 404);
   }

   $category->update($request->all());

   return response()->json($category);
   }

   
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
