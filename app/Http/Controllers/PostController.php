<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'require|string',
            'user_id' => ['unsignedBigInteger'],
            'test_id' => ['unsignedBigInteger'],
            'posttext_id' => ['unsignedBigInteger'],
            'picture_id' => ['unsignedBigInteger'],
            'work_id' => ['unsignedBigInteger'],
            'group_id' => ['unsignedBigInteger'],
        ]);

        $post = Post::create($data, [
            'title' => $data['title'],
            'user_id' => $data['user_id'],
            'test_id' => $data['test_id'],
            'posttext_id' => $data['posttext_id'],
            'picture_id' => $data['picture_id'],
            'work_id' => $data['work_id'],
            'group_id' => $data['group_id'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'require|string',
            'user_id' => ['unsignedBigInteger'],
            'test_id' => ['unsignedBigInteger'],
            'posttext_id' => ['unsignedBigInteger'],
            'picture_id' => ['unsignedBigInteger'],
            'work_id' => ['unsignedBigInteger'],
            'group_id' => ['unsignedBigInteger'],
        ]);

        $post->update($data, [
            'title' => $data['title'],
            'user_id' => $data['user_id'],
            'test_id' => $data['test_id'],
            'posttext_id' => $data['posttext_id'],
            'picture_id' => $data['picture_id'],
            'work_id' => $data['work_id'],
            'group_id' => $data['group_id'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
