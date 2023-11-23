<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\GroupPost;
use App\Models\Course\Img;
use App\Models\Course\Post;
use App\Models\Course\Posttext;
use App\Models\Group;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'row_id' => 'required',
            'side' => 'numeric',
        ]);
        $post = Post::create($data);

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('course.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'require|string',
            'user_id' => ['unsignedBigInteger'],
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
        return $post->delete();

    }

    public function create(){
        $update = false;
        $user = auth()->user();

//        $posttext = Posttext::all();

        return view("course.course_creatior", compact(['update',"user"]));
    }

    public function updater(){
        $update = true;

        return view("course.course_creatior", compact('update', ));
    }

    public function creatorP($data){
        $postD = $data['course'];

        $post = Post::create($postD);

    }
}
