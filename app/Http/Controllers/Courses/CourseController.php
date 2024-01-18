<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\Course;
use App\Models\Course\Lesson;
use App\Models\Course\Post;
use App\Models\Course\Row;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where("user_id", auth()->user()->id)->get();
        return view('list_course', compact('courses'));

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title_course' => 'string',
        ]);
        $course = Course::firstOrCreate([
            'title' => $data['title_course'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back();
    }

    public function getLesson(Request $request){

        $lessons = Course::find($request->course_id)->lessons;
        return $lessons;
    }
    /**
     * Display the specified resource.
     */
    public function show($id, Course $course)
    {
        return response()->json([
            'data' => [
                'title' => $course->title,
                'user_id' => $course->user
            ]
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $course->fill($request->except(['course_id']));
        $course->save();
        return response()->json($course);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {

        return response()->json([
            'data' => [
                $course->delete(),
            ]
        ]);
    }
    public function manager(){
        $user_id = auth()->user()->id;
        $courses = Course::all();
        return view('list_course', compact('courses'));
    }
}
