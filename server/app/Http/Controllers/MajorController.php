<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $major = Major::paginate(10);
        return response()->json([
            'data' => $major
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $major = Major::create([
            'idMajor' => $request->idMajor,
            'nameMajor' => $request->nameMajor,
        ]);
        return response()->json([
            'data' =>$major
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return response()->json([
            'data' => $major
        ]);
    }
        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        $major->idMajor = $request->idMajor;
        $major->nameMajor = $request->nameMajor;
        $major->save();
        return response()->json([
            'data' =>$major
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();
        return response()->json([
            'message' => 'major deleted'
        ], 204);
    }
}
