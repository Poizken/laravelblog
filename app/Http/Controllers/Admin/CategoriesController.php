<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', "Category \"{$request->title}\" has been created");
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request, [
            'title' => 'required'
        ]);
        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', "Category \"{$request->title}\" has been updated");
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $title = $category->title;
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', "Category \"{$title}\" has been deleted");
    }
}
