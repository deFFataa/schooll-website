<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::paginate(10);

        return view('admin.staffs.index', ['staff' => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $attributes = $request->validate([
            'avatar' => ['required'],
            'name' => ['required'],
            'position' => ['required'],
            'type' => ['required'],
            'advisee' => ['sometimes'],
        ]);

        $avatarPath = $request->file('avatar')->store('avatars', 'public');
    
        $attributes['avatar'] = $avatarPath;
        
        // dd($attributes);

        Staff::create($attributes);

        return redirect('/staff')->with('success', 'A staff was added successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('admin.staffs.edit', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'position' => ['required'],
            'type' => ['required'],
            'avatar' => ['sometimes', 'image'],
        ]);
    
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $attributes['avatar'] = $avatarPath;
    
            if ($staff->avatar) {
                Storage::disk('public')->delete($staff->avatar);
            }
        } else {
            $attributes['avatar'] = $staff->avatar;
        }
    
        // dd($attributes);
    
        $staff->update($attributes);
    
        return redirect('/staff/edit/' . $staff->id)->with('success', 'Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        
        return redirect('/staff')->with('danger', 'The staff was successfully Deleted');
    }

    public function search(){
        $query = request('q');
        $staff = Staff::query()
            ->where('name', 'LIKE', '%'.$query.'%')
            ->paginate(10);
        
        return view('admin.staffs.search', ['staff' => $staff, 'query' => $query]);
    }
}
