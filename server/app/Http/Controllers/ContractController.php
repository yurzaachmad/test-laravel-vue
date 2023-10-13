<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contract = Contract::paginate(10);
        return response()->json([
            'data' => $contract
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contract = Contract::create([
            'idContract' => $request->idContract,
            'result' => $request->result,
            'nip' => $request->nip,
            'idStudy' => $request->idStudy,
            'passed' => $request->passed,
            'nim' => $request->nim,
            'date' => $request->date,
        ]);
        return response()->json([
            'data' =>$contract
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return response()->json([
            'data' => $contract
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $contract->idContract = $request->idContract;
        $contract->result = $request->result;
        $contract->nip = $request->nip;
        $contract->idStudy = $request->idStudy;
        $contract->nim = $request->nim;
        $contract->date = $request->date;
        $contract->save();
        return response()->json([
            'data' =>$contract
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return response()->json([
            'message' => 'contract deleted'
        ], 204);
    }
}
