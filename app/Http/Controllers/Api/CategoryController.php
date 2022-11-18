<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|string|max:255'
        ]);

        $name = $request->post('name');
        $category = new Category;
        $category->name = $name;

        $category->save();

        return true;
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|int|exists:categories,id',
            'name' => 'required|string|max:255'
        ]);

        $category = Category::find($request->post('id'));
        $category->name = $request->post('name');
        $category->save();

        return true;
    }

    public function destroy(Request $request)
    {
        return Category::find($request->post('id'))->delete();
    }
}
