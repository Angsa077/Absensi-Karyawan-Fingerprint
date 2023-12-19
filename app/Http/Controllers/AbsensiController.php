<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TADPHP\TADFactory;
use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{

    private $tad;

    public function __construct()
    {
        $this->tad = (new TADFactory(['ip' => '172.16.13.191']))->get_instance();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $get_att_log = $this->tad->get_att_log(['pin' => 48]);
        $get_att_log = $get_att_log->to_json();

        $get_all_user_info = $this->tad->get_all_user_info();
        $user_info_array = [];
        $user_info_array = $get_all_user_info->to_array();

        // $get_fingerprint_algorithm = $this->tad->get_fingerprint_algorithm();
        return view('absensi.index', compact('user_info_array', 'get_att_log'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absensi.create');
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

        $result = $this->tad->set_user_info($data);

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
        $user_info = $this->tad->get_user_info(['pin' => $pin])->to_array();
        return view('absensi.edit', compact('user_info'));
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

        $result = $this->tad->set_user_info($data);

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
        $result = $this->tad->delete_user(['pin' => $pin]);

        if ($result) {
            return response()->json(['success' => 'User deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete user'], 500);
        }
    }
}
