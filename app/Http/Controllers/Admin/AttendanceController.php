<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::when(request()->q, function ($query) {
            return $query->where('date_time', 'like', '%' . request()->q . '%');
        })
            ->when(request()->attendance_type, function ($query) {
                return $query->where('attendance_type_id', request()->attendance_type);
            })
            ->when(request()->date, function ($query) {
                // Filter berdasarkan tanggal, mengabaikan waktu
                return $query->whereDate('date_time', '=', request()->date);  // Pastikan hanya membandingkan tanggal
            })
            ->with('student', 'attendance_type')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $attendances->appends(['q' => request()->q, 'attendance_type' => request()->attendance_type, 'date' => request()->date]);

        return inertia('Admin/Attendances/Index', [
            'attendances' => $attendances,
            'attendanceTypes' => \App\Models\AttendanceType::all(),
        ]);
    }
}
