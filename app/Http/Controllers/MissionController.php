<?php

namespace App\Http\Controllers;

use App\Models\Mission;


use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function show()
    {
        $mission = Mission::where('name', 'mission')->value('content');
        return view('admin.mission.show&edit', ['mission' => $mission]);
    }

    public function store(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required'],
            'content' => ['required'],
        ]);

        $store = Mission::create($attribute);

        if(!$store){
            return redirect('/mission')->with('danger', 'There was some error. Please try again.');
        }

        return redirect('/mission')->with('success', 'Mission was added successfully');

    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        $mission = Mission::find(1);
        if ($mission) {
            $mission->update(['content' => $request->content]);

            return redirect('/mission')->with('success', 'Mission was updated successfully.');
        }

        return redirect('/mission')->with('mission', 'An error occured. Please try again.');
    }
}
