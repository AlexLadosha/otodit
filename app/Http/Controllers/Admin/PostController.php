<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));

    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
        ]);
        $data = $request->all();
        $data['image'] = Post::uploadImage($request);
        $post = Post::create($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
        ]);
        $post = Post::find($id);
        $data = $request->all();
        $data['image'] = Post::uploadImage($request, $post->image);


        $post->update($data);
        $post->tags()->sync($request->tags);


        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->sync([]);
        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Статья удалена');

    }
}
