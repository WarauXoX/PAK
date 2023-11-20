<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\PostText;
use Illuminate\Http\Request;

class PostTextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posttexts = Posttext::all();
        foreach ($posttexts as $posttext){
            return response()->json([
                "data" => [
                    "id" => $posttext->id,
                    "title" => $posttext->title,
                    "course" => $posttext->post,
                ]
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required',
            'title' => 'string',
            'text' => 'string',
        ]);

        $postText = PostText::create($data);
        return $postText;
    }

    /**
     * Display the specified resource.
     */
    public function show(Posttext $postText)
    {
        return $postText;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posttext $postText)
    {
        $data = $request->validate([
            'post_id' => 'required',
            'title' => 'string',
            'text' => 'string',
        ]);

        $postText->update($data);
        $postText->save();
        return $postText;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posttext $postText)
    {
        //
    }
}
