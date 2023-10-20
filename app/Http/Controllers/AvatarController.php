<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatars = Avatar::all();
        return view('avatar.all', compact('avatars'));
    }

    public function store(Request $request)
    {
        $req = $request;

        $request->validate([
            'title' => 'required',
            'image_path' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image_path')->store('assets/img/avatar', 'public');
        $avatar = new Avatar([
            'title' => $request->get('title'),
            'image_path' => $imagePath,
        ]);;
        $avatar->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avatar $avatar)
    {
        //
    }
}
