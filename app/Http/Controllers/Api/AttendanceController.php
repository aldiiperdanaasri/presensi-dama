<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\AttendanceType;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function presence(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $student = Student::findOrFail(1);
        $attendance_type = AttendanceType::findOrFail(1);
        $attendance = new Attendance;
        $attendance->student_id = $student->id;
        $attendance->attendance_type_id = $attendance_type->id;
        $attendance->date_time = now();
        $attendance->latlon = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Presence success',
            'attendance' => $attendance
        ], 200);
    }
}
