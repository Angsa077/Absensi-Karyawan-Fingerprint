<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateController extends Controller
{
    public function create()
    {
        $getsDate = getsDate();
        $dateJson = $getsDate->get_response(['format' => 'json']);
        $date = json_decode($dateJson);
        return view('date.create', compact('date'));
    }

    public function store(Request $request)
    {
        $data = [
            'date' => $request->date,
            'time' => $request->time,
        ];

        $result = setDate($data);
        if ($result) {
            return response()->json(['success' => 'Date Created successfully']);
        } else {
            return response()->json(['error' => 'Failed to create Date'], 500);
        }
    }
}
