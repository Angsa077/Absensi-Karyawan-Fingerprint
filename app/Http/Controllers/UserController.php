<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAllUserInfo = getAllUserInfo();
        return view('user.index', compact('getAllUserInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'pin' => $request->input('pin'),
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'privilege' => $request->input('privilege'),
        ];

        $result = setUserInfo($data);

        if ($result) {
            return response()->json(['success' => 'User Created successfully']);
        } else {
            return response()->json(['error' => 'Failed to create user'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($pin)
    {
        $userInfo = getUserInfo($pin);
        return view('user.edit', compact('userInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pin)
    {
        $data = [
            'pin' => $request->input('pin'),
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'privilege' => $request->input('privilege'),
        ];

        $result = setUserInfo($data);

        if ($result) {
            return response()->json(['success' => 'User updated successfully']);
        } else {
            return response()->json(['error' => 'Failed to update user'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pin)
    {
        $result = deleteUser($pin);

        if ($result) {
            return response()->json(['success' => 'User deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete user'], 500);
        }
    }
}
