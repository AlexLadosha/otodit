<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', ['categories' => $categories]);

    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
        ]);
        Category::create($request->all());
        $request->session()->flash('success', 'Категория добавлена');
        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $category = Category::find($id);
       return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Категория удалена');

    }
}
