<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagsController extends Controller
{
    protected $rules = ['title' => 'required|max:60'];

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        Tag::create($request->all());

        return redirect()->route('admin.tags.index')->with('success', "Tag \"{$request->title}\" has been created");
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', ['tag' => $tag]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request, $this->rules);
        $tag->update($request->all());

        return redirect()->route('admin.tags.index')->with('success', "Tag \"{$request->title}\" has been updated");
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $title = $tag->title;
        $tag->delete();

        return redirect()->route('admin.categories.index')->with('success', "Tag \"{$title}\" has been deleted");
    }
}
