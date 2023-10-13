<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::paginate(10);
        return response()->json([
            'data' => $dosen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dosen = Dosen::create([
            'nip' => $request->nip,
            'name' => $request->name,
        ]);
        return response()->json([
            'data' =>$dosen
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return response()->json([
            'data' => $dosen
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $dosen->nip = $request->nip;
        $dosen->name = $request->name;
        $dosen->save();
        return response()->json([
            'data' =>$dosen
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return response()->json([
            'message' => 'dosen deleted'
        ], 204);
    }
}
