<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function show(){
        $posts = Post::latest()->paginate(5);
        
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
            'author_name' => ['required'],
            'date' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);   

        return redirect('/post/add')->with('success', 'A post was added successfully.');
    }

    public function update(Request $request, Post $post){
            
        $attributes = $request->validate([
            'author_name' => ['required'],
            'date' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);

        $attributes['user_id'] = auth()->id();

        $post->update($attributes);   

        return redirect('/post')->with('success', 'A post was edited successfully.');
    }

    public function destroy(Post $post){
        $post->delete();

        return redirect('/post')->with('danger', 'A post was deleted successfully.');
    }
}
