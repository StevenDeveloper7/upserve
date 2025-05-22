<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::join('category_products', 'category_products.id', '=', 'products.category_id')
        ->select('products.*', 'category_products.name AS category')->get();
        $categories = CategoryProduct::select('category_products.id AS id', 'category_products.name AS description')->get();

        return Inertia::render('Product/AdminProduct', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        Product::create([
            'name'          =>       $request->name,
            'description'   =>       $request->description,
            'cost'          =>       $request->cost,
            'quantity'      =>       $request->quantity,
            'category_id'   =>       $request->category_id
        ]);
    }

    public function update(Request $request, $productId)
    {

        $product = Product::find($productId);
        $product->name              =   $request->name;
        $product->description       =   $request->description;
        $product->cost              =   $request->cost;
        $product->quantity          =   $request->quantity;
        $product->category_id      =   $request->category_id;

        $product->save();
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->productId);
        $product->delete();

        $products = Product::join('category_products', 'category_products.id', '=', 'products.category_id')
        ->select('products.*', 'category_products.name AS category')->get();
        
        return $products;
    }
}
