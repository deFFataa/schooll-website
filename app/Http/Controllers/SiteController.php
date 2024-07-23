<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use App\Models\Post;
use App\Models\Mission;
use App\Models\Event;
use App\Models\Staff;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $latestNews = Post::latest('date')->first();
        $news = Post::where('id', '!=', $latestNews->id)
                    ->orderBy('date', 'DESC')
                    ->take(5)
                    ->get();
        $events = Event::orderBy('date', 'DESC')
                    ->take(5)
                    ->get();
    
        return view('site.welcome', [
            'latestNews' => $latestNews,
            'news' => $news,
            'events' => $events,
        ]);
    }
    
    public function aboutUs()
    {
        $vision = Vision::find(1)->value('content');
        $mission = Mission::find(1)->value('content');

        return view('site.about-us', [
            'vision' => $vision,
            'mission' => $mission,
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

        $principal = Staff::where('type', '=' , 'Principal')->first();

        $staffs = Staff::where('id', '!=', $principal->id)
                        ->orderBy('position', 'ASC')
                        ->get();
    return view('site.staffs', [ 'staffs' => $staffs, 'principal' => $principal ]);
    }

    public function newsRead($id){

        $news = Post::where('id', '=', $id)->first();
        $otherNews = Post::where('id', '!=', $news->id)
                        ->orderBy('date', 'DESC')
                        ->limit(3)
                        ->get();

        // dd($news);

        return view('site.read-news', ['news' => $news, 'otherNews' => $otherNews]);

    }
}
