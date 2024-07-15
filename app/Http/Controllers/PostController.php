<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index(){
        $posts = Post::paginate(5);
        return view('admin.index', ['posts' => $posts]);
    }
    
    public function create(Request $request){
                
        Post::all();

        return view('admin.create');
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
}
