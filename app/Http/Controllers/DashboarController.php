<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class DashboarController extends Controller
{
    public function index()
    {
        // Total Absensi Hari Ini
        $getAllAttLog = getAllAttLog();
        $attendanceLog = json_decode($getAllAttLog, true);
        $attendanceRows = $attendanceLog['Row'];

        $absensiToday = [];

        foreach ($attendanceRows as $attendance) {
            $dateTimeString = $attendance['DateTime'];
            $dateTime = new DateTime($dateTimeString);
            $hari = $dateTime->format('Y-m-d');
            $today = date('Y-m-d');

            if ($hari === $today) {
                $absensiToday[] = $attendance;
            }
        }
        $totalAbsensiToday = count($absensiToday);

        // Total Terlambat Hari Ini
        $totalTerlambat = 0;
        foreach ($absensiToday as $attendance) {
            $absensiDateToday = $attendance['DateTime'];
            $dateTimeToday = new DateTime($absensiDateToday);
            $jam = $dateTimeToday->format('H:i:s');

            // Periksa apakah jam terlambat
            if ($jam >= '08:00:00') {
                $totalTerlambat++;
            }
        }

        // Total User
        $getAllUserInfo = getAllUserInfo();
        $userRows = $getAllUserInfo['Row'];
        $totalUser = count($userRows);

        return view('dashboard', compact('absensiToday', 'totalAbsensiToday', 'totalUser', 'totalTerlambat'));
    }
}
