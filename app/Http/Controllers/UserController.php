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


    public function filtered(Request $request)
    {
        $getAllUserInfo = getAllUserInfo();
        $filteredUsers = $this->filterUsers($getAllUserInfo['Row'], $request->input('pin2'), $request->input('name'));
        return view('user.filtered', compact('filteredUsers'));
    }


    private function filterUsers($users, $pin2, $name)
    {
        $filteredUsers = $users;
        if (!empty($pin2)) {
            $filteredUsers = array_filter($filteredUsers, function ($user) use ($pin2) {
                return strpos(strtolower($user['PIN2']), strtolower($pin2)) !== false;
            });
        }
        if (!empty($name)) {
            $filteredUsers = array_filter($filteredUsers, function ($user) use ($name) {
                return strpos(strtolower($user['Name']), strtolower($name)) !== false;
            });
        }
        return array_values($filteredUsers);
    }


    public function create()
    {
        return view('user.create');
    }


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


    public function edit($pin)
    {
        $userInfo = getUserInfo($pin);
        return view('user.edit', compact('userInfo'));
    }


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
