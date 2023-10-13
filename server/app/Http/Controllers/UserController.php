<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return response()->json([
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'idMajor' => $request->idMajor,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ]);
        return response()->json([
            'data' =>$user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->idMajor = $request->idMajor;
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->role = $request->role;
        $user->save();
        return response()->json([
            'data' =>$user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'user deleted'
        ], 204);
    }
}
