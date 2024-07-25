<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use App\Models\Post;
use App\Models\Mission;
use App\Models\Event;
use App\Models\Staff;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        try {
            $latestNews = Post::latest('date')->first();
    
            if ($latestNews) {
                $news = Post::where('id', '!=', $latestNews->id)
                            ->orderBy('date', 'DESC')
                            ->take(5)
                            ->get();
            } else {
                $news = collect();
            }
    
            $events = Event::orderBy('date', 'DESC')
                        ->take(5)
                        ->get();
    
            return view('site.welcome', [
                'latestNews' => $latestNews ?? $latestNews,
                'news' => $news ?? $news,
                'events' => $events ?? $events,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching posts or events: ' . $e->getMessage());
    
            return view('site.welcome', [
                'latestNews' => null,
                'news' => null,
                'events' => null,
            ])->withErrors(['There was an error fetching the latest posts or events.']);
        }
    }
    
    public function aboutUs()
    {

        $vision = Vision::findOr(1, fn() => 'No Data Available');
        $mission = Mission::findOr(1, fn() => 'No data available');

        return view('site.about-us', [
            'vision' => $vision,
            'mission' => $mission 
        ]);

    }

    public function news()
    {
        $news = Post::latest('date')
                    ->paginate(5);
        return view('site.news', [ 'news' => $news ]);
    }

    public function events(){
        $events = Event::latest('date')
                        ->paginate(5);
        return view('site.events', [ 'events' => $events ]);
    }

    public function staffs(){

        try {
            $principal = Staff::where('type', '=' , 'principal')->first();

            $staffs = Staff::where('id', '!=', $principal->id)
                            ->orderBy('position', 'ASC')
                            ->get();
            return view('site.staffs', [ 'staffs' => $staffs, 'principal' => $principal ]);
        } catch (\Throwable $th) {
            \Log::error('Error fetching posts or events: ' . $th->getMessage());
            return view('site.staffs', [ 'staffs' => null, 'principal' => null ]);
        }


    }

    public function newsRead($slug)
    {
        $news = Post::where('slug', $slug)->firstOrFail();
    
        $otherNews = Post::where('id', '!=', $news->id)
                         ->orderBy('date', 'DESC')
                         ->limit(3)
                         ->get();
    
        return view('site.read-news', ['news' => $news, 'otherNews' => $otherNews]);
    }

    public function eventsRead($slug)
    {
        $events = Event::where('slug', $slug)->firstOrFail();
    
        $otherEvents = Event::where('id', '!=', $events->id)
                         ->orderBy('date', 'DESC')
                         ->limit(3)
                         ->get();
    
        return view('site.read-events', ['events' => $events, 'otherEvents' => $otherEvents]);
    }
    
    public function search(){
        $query = trim(request('q'));
        
        if (empty($query)) {
            return view('site.search', [
                'events' => collect(),
                'news' => collect(),
                'query' => $query
            ]);
        }
        
        $events = Event::query()
            ->where('title', 'LIKE', '%'.$query.'%')
            ->get();
        
        $news = Post::query()
            ->where('title', 'LIKE', '%'.$query.'%')
            ->get();
        
        return view('site.search', [
            'events' => $events,
            'news' => $news,
            'query' => $query
        ]);
    }
    
    
}
