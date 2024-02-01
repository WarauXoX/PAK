<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course\Post;
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
        return redirect()->back();
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

        Post::create([
            'side' => 1,
            'row_id' => $row->id,
            'posttext_id' => 0,
        ]);
        Post::create([
            'side' => 0,
            'row_id' => $row->id,
            'posttext_id' => 0,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Row $row)
    {

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
