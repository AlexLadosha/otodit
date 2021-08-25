<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));

    }

    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
        ]);
        Tag::create($request->all());
        $request->session()->flash('success', 'Тег добавлен');
        return redirect()->route('tags.index')->with('success', 'Тег добавлен');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $tag = Tag::find($id);
       return view('admin.tags.edit', ['tag' => $tag]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
        ]);
        $tag = Tag::find($id);
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Тег удален');

    }
}
