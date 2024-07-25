<?php

namespace App\Http\Controllers;

use App\Models\Vision;

use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function show()
    {
        $vision = Vision::where('name', 'vision')->value('content');

        return view('admin.vision.show&edit', ['vision' => $vision]);
    }

    public function store(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required'],
            'content' => ['required'],
        ]);

        $store = Vision::create($attribute);

        if(!$store){
            return redirect('/vision')->with('danger', 'There was some error. Please try again.');
        }

        return redirect('/vision')->with('success', 'Mission was added successfully');

    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        $vision = Vision::find(1);
        if ($vision) {
            $vision->update(['content' => $request->content]);

            return redirect('/vision')->with('success', 'Vision was updated successfully.');
        }

        return redirect('/vision')->with('error', 'Vision not found.');
    }

}
