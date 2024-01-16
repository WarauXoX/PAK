<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\Course;
use App\Models\Course\Lesson;
use App\Models\Course\Row;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($c_id)
    {
        $course = Course::where('id', $c_id)->get()[0];
        if(isset($course->lessons)){
            $lessons = $course->lessons;
        }
        else{
            $lessons = [];
        }
        return view('list_lesson', compact('lessons', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'string',
            'course_id' => 'numeric',
        ]);

        $lesson = Lesson::firstOrCreate($data);

        return redirect()->back();
    }
    public function getRows(Request $request){
        $lesson = Lesson::find($request->lesson_id);
        $rows = $lesson->rows;
        $data = [];
        foreach ($rows as $row){
            $row->posts = $row->posts;
            foreach ($row->posts as $post) {
                $post->posttexts;
            }
            array_push($data, $row);
        }
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return response()->json([
            'data' => [
                'title' => $lesson->title,
                'course' => $lesson->course,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {

        $lesson->fill($request->except(['lesson_id']));
        $lesson->save();
        return response()->json($lesson);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $data = $lesson->delete();
        return redirect()->back(compact('data'));
    }

    public function list_lessons(Request $request){
        $course_id = $request->course_id;
        $course_name = Course::where('id',$course_id)->first()->title;
        $lessons = Lesson::where('course_id', $course_id)->get();

        return view('list_lesson', compact('course_name', 'lessons'));
    }
}
