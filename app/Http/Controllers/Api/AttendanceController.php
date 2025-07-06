<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\AttendanceType;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function getAllPresences()
    {
        $presences = Attendance::all();

        return response()->json([
            'message' => 'List of presences',
            'data' => $presences,
        ], 200);
    }

    public function presence(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'attendance_type_id' => 'required|exists:attendance_types,id',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $attendance = new Attendance;
        $attendance->student_id = $request->student_id;
        $attendance->attendance_type_id = $request->attendance_type_id;
        $attendance->date_time = now();
        $attendance->latlon = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Presence success',
            'attendance' => $attendance
        ], 200);
    }
}
