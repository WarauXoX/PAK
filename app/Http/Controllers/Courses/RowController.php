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
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'lesson_id' => 'numeric|nullable',
        ]);

        $row = Row::create($data);
        $posts = $row->posts;

        return $row;
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
    public function update(Request $request)
    {
        $row = Row::first($request->id);
        dd($row);
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
