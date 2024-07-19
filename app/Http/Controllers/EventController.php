<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use App\Models\Event;

class EventController extends Controller
{
    public function show(){
        $events = Event::latest()->paginate(5);
        
        return view('admin.event.index', ['events' => $events]);
    }

    public function create(){
      
        return view('admin.event.create');
    }

    public function edit(Event $event){
        return view('admin.event.edit', ['events' => $event]);
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'thumbnail' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'starting_date' => ['required'],
            'ending_date' => ['required', 'after_or_equal:starting_date'],
        ]);
        $thumbnailPath = $request->file('thumbnail')->store('event_thumbnail', 'public');
    
        $attributes['thumbnail'] = $thumbnailPath;
        $attributes['archived'] = false;
        
        // dd($attributes);

        Event::create($attributes);

        return redirect('/events')->with('success', 'The event was successfuly added.');
        
    }

    public function update(Request $request, Event $event)
    {
        $attributes = $request->validate([
            'thumbnail' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'starting_date' => ['required'],
            'ending_date' => ['required', 'after_or_equal:starting_date'],
        ]);

        // dd($attributes);
    
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('event_thumbnail', 'public');
    
            $attributes['thumbnail'] = $thumbnailPath;
    
            if ($event->thumbnail) {
                Storage::disk('public')->delete($event->thumbnail);
            }
        }
    
        $event->update($attributes);
    
        return redirect('/events')->with('success', 'An event was edited successfully.');
    }

    public function destroy(Event $event){
        $event->delete();

        return redirect('/events')->with('danger', 'An event was successfully deleted');
    }
    
    
}
