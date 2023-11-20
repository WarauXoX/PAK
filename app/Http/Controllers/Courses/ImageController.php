<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\Img;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Img::all();
        return view('image.all', compact('images'));
    }
    public function show(Img $img){
        return $img;
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image_path' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image_path')->store('assets/img/image', 'public');
        $image = new Img([
            'title' => $request->get('title'),
            'image_path' => $imagePath,
        ]);;
        $image->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Img $image)
    {
        //
    }
}
