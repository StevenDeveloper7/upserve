<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = CategoryProduct::all();

        return Inertia::render('Category/Category', compact('categories'));
    }

    public function store(Request $request)
    {
        CategoryProduct::create([
            'name'          =>       $request->name,
            'description'   =>       $request->description
        ]);
    }

    public function update(Request $request, $categoryProductId)
    {

        $categoryProduct = CategoryProduct::find($categoryProductId);
        $categoryProduct->name              =   $request->name;
        $categoryProduct->description       =   $request->description;


        $categoryProduct->save();
    }

    public function delete(Request $request)
    {
        $categoryProduct = CategoryProduct::find($request->categoryId);
        $categoryProduct->delete();

        $categories = CategoryProduct::all();
        
        return $categories;
    }
}
