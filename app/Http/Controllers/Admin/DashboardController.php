<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\AttendanceType;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = User::count() - 1;
        $students = Student::count();
        $attendance_types = AttendanceType::count();
        $attendances = Attendance::count();

        return inertia('Admin/Dashboard/Index', [
            'users'            => $users,
            'students'         => $students,
            'attendance_types' => $attendance_types,
            'attendances'      => $attendances,
        ]);
    }
}
