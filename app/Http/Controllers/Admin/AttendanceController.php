<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::when(request()->q, function ($attendances) {
            $attendances = $attendances->where('date_time', 'like', '%' . request()->q . '%');
        })->with('student', 'attendance_type')->orderBy('id', 'desc')->paginate(10);

        $attendances->appends(['q' => request()->q]);

        return inertia('Admin/Attendances/Index', [
            'attendances' => $attendances,
        ]);
    }
}
