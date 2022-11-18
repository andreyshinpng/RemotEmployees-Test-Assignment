<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        $name = $request->post('name');
        $description = $request->post('description');
        $categoryId = $request->post('category_id');

        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->category_id = $categoryId;

        $product->save();

        return true;
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|int|exists:products,id',
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255'
        ]);

        $product = Product::find($request->post('id'));
        $product->name = $request->post('name');
        $product->description = $request->post('description');
        $product->category_id = $request->post('category_id');

        $product->save();

        return true;
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|int|exists:products,id'
        ]);
        return Product::find($request->post('id'))->delete();
    }
}
