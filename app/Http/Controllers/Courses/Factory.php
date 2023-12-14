<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Course\Posttext;
use App\Models\Course\Post;
use App\Models\Course\Lesson;

class Factory extends Controller
{
    public function showChildren(Request $request){
        $post = Post::first($request->post_id);


        if(isset($post->postTexts)){
            $text = $post->postTexts;
            return view('posts.text', compact('text'));
        }
        if(isset($post->imgs)){
            $imgs = $post->imgs;
            return $imgs;
        }
        else{
            return null;
        }
    }

    public function storePost(Request $request)
    {
        $postData = $request->validate([
            'side' => 'required',
            'row_id' => 'required',
        ]);
        return Post::firstOrCreate($postData);
    }


    public function storeText(Request $request)  //col row_id
    {
        $post = $this->storePost($request);

        $text = Posttext::create([
            'title' => ' ',
            'text' => ' ',
            'post_id' => $post->id
        ]);
        return view('posts.text', compact('text'));
    }

}
