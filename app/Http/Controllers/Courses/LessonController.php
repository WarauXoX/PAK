<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\Lesson;
use App\Models\Course\Row;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(1111);
        $lessons = Lesson::all();

        $data = [];
        foreach ($lessons as $lesson){
            array_push($data, [
                'id' => $lesson->id,
                'title' => $lesson->title,
                'course' => $lesson->course,
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
            'course_id' => 'numeric',
        ]);

        $lesson = Lesson::firstOrCreate($data);

        return $lesson;
    }
    public function getRows(Request $request){
        $lesson = Lesson::find($request->lesson_id);
        $rows = $lesson->rows;
        $data = [];
        foreach ($rows as $row){
            $row->posts = $row->posts;
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
        return response()->json([
            'data' => [
                $lesson->delete(),
            ]
        ]);
    }
}
