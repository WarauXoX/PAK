<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Group::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['require', 'string'],
            'user_id' => ['unsignedBigInteger'],
        ]);

        $group = Group::created($data->all());
        return $group;
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return $group;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'title' => ['require', 'string'],
            'user_id' => ['unsignedBigInteger']
        ]);

        $group->update($data);
        $group->save();
        return $group;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $mess = $group->delete();
        return $mess;
    }
}
