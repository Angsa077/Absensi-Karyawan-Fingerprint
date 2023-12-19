<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class AbsensiController extends Controller
{
    public function index()
    {
        // get all attendance
        $getAllAttLog = getAllAttLog();
        $attendanceLog = json_decode($getAllAttLog, true);
        $attendanceRows = array_reverse($attendanceLog['Row']);
        return view('absensi.index', compact('attendanceRows'));
    }

    public function filtered(Request $request)
    {
        $getAllAttLog = getAllAttLog();
        $attendanceLog = json_decode($getAllAttLog, true);
        $attendanceRows = array_reverse($attendanceLog['Row']);
        $tanggalFilter = $request->input('tanggal');
        $statusFilter = $request->input('status');
        $filteredRows = $this->filterAttendance($attendanceRows, $tanggalFilter, $statusFilter);
        return view('absensi.filtered', compact('filteredRows'));
    }

    private function filterAttendance($rows, $tanggalFilter, $statusFilter)
    {
        $filteredRows = [];

        foreach ($rows as $attendance) {
            $dateTimeString = $attendance['DateTime'];
            $dateTime = new DateTime($dateTimeString);
            $jam = $dateTime->format('H:i:s');

            $hari = $dateTime->format('Y-m-d');
            $today = date('Y-m-d');

            $terlambat = ($jam >= '08:00:00');

            if (($tanggalFilter === null || $hari === $tanggalFilter) &&
                ($statusFilter === null || ($statusFilter === 'terlambat' && $terlambat) || ($statusFilter === 'tepat' && !$terlambat))
            ) {
                $filteredRows[] = $attendance;
            }
        }

        return $filteredRows;
    }
}
