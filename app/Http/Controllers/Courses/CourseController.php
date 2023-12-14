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
        $courses = Course::where(["user_id", auth()->user()->id]);

        $data = [];
        foreach ($courses as $course){
            array_push($data, [
                'id' => $course->id,
                'title' => $course->title,
                'user_id' => $course->user_id,
            ]);
        }
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'string',
        ]);

        $course = Course::firstOrCreate([
            'title' => $data['title'],
            'user_id' => auth()->user()->id,
        ]);
        return $course;
    }
    public function getLesson(Request $request){
        $lessons = Course::find($request->course_id)->lessons;
        return $lessons;
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $course)
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

}
