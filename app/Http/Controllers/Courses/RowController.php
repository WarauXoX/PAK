<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\Row;
use Illuminate\Http\Request;

class RowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Row::all();

        $data = [];
        foreach ($rows as $row){
            array_push($data, [
                'id' => $row->id,
                'number' => $row->number,
                'lesson' => $row->lesson,
            ]);
        }
        return response()->json([
            'data' => $rows

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'integer',
            'lesson_id' => 'numeric|nullable',

        ]);

        $row = Row::create($data);

        return response()->json([
            'data' => [
                'id' => $row->id,
                'number' => $row->number,
                'lesson' => $row->lesson,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Row $row)
    {
        return response()->json([
            'data' => [
                'title' => $row->number,
                'lesson' => $row->lesson,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Row $row)
    {
        $row->fill($request->except(['course_id']));
        $row->save();
        return response()->json($row);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Row $row)
    {
        return response()->json([
            'data' => [
                $row->delete(),
            ]
        ]);
    }
}
