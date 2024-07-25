<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    
    public function show(){
        $posts = Post::latest()->paginate(10);
        
        return view('admin.posts.index', ['posts' => $posts]);
    }
    
    public function create(Request $request){
                
        Post::all();

        return view('admin.posts.create');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['posts' => $post]);
    }

    public function store(Request $request){
                
        $attributes = $request->validate([
            'thumbnail' => ['sometimes', 'image'],
            'author_name' => ['required'],
            'date' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);

        if ($request->hasFile('thumbnail')) {

            $thumbnailPath = $request->file('thumbnail')->store('news_thumbnail', 'public');
            $attributes['thumbnail'] = $thumbnailPath;

        } 

        $title = $attributes['title'];
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($title);

        Post::create($attributes);   

        return redirect('/post/add')->with('success', 'A post was added successfully.');
    }

    public function update(Request $request, Post $post){
            
        $attributes = $request->validate([
            'thumbnail' => ['sometimes'],
            'author_name' => ['required'],
            'date' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('news_thumbnail', 'public');
    
            $attributes['thumbnail'] = $thumbnailPath;
    
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
        } else {
            $attributes['thumbnail'] = $post->thumbnail;
        }

        $attributes['user_id'] = auth()->id();

        $post->update($attributes);   

        return redirect('/post')->with('success', 'A post was edited successfully.');
    }

    public function destroy(Post $post){
        $post->delete();

        return redirect('/post')->with('danger', 'A post was deleted successfully.');
    }

    public function search(){
        $query = request('q');
        $post = Post::query()
            ->where('title', 'LIKE', '%'.$query.'%')
            ->paginate(10);
        
        return view('admin.posts.search', ['posts' => $post, 'query' => $query]);
    }
}
