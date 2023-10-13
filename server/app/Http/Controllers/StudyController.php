<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = Study::paginate(10);
        return response()->json([
            'data' => $studies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $study = Study::create([
            'idStudy' => $request->idStudy,
            'nameStudy' => $request->nameStudy,
            'sks' => $request->sks,
        ]);
        return response()->json([
            'data' =>$study
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Study $study)
    {
        return response()->json([
            'data' => $study
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Study $study)
    {
        $study->idStudy = $request->idStudy;
        $study->nameStudy = $request->nameStudy;
        $study->sks = $request->sks;
        $study->save();
        return response()->json([
            'data' =>$study
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Study $study)
    {
        $study->delete();
        return response()->json([
            'message' => 'study deleted'
        ], 204);
    }
}
