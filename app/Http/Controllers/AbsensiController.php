<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{

    public function index()
    {
        $getAllAttLog = getAllAttLog();
        return view('absensi.index', compact('getAllAttLog'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit($pin)
    {
    }

    public function update(Request $request, $pin)
    {
    }

    public function destroy($pin)
    {
    }
}
