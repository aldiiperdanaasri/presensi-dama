<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceType;
use Illuminate\Http\Request;

class AttendanceTypeController extends Controller
{
    public function index()
    {
        $attendance_types = AttendanceType::when(request()->q, function ($attendance_types) {
            $attendance_types = $attendance_types->where('name', 'like', '%' . request()->q . '%');
        })->orderBy('id', 'desc')->paginate(10);

        $attendance_types->appends(['q' => request()->q]);

        return inertia('Admin/AttendanceTypes/Index', [
            'attendance_types' => $attendance_types,
        ]);
    }

    public function create()
    {
        return inertia('Admin/AttendanceTypes/Create', []);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'time_in'       => 'required|string',
            'time_out'      => 'required|string'
        ]);

        AttendanceType::create([
            'name'          => $request->name,
            'time_in'       => $request->time_in,
            'time_out'      => $request->time_out
        ]);

        return redirect()->route('admin.attendance_types.index');
    }

    public function edit($id)
    {
        $attendance_type = AttendanceType::findOrFail($id);

        return inertia('Admin/AttendanceTypes/Edit', [
            'attendance_type' => $attendance_type,
        ]);
    }

    public function update(Request $request, AttendanceType $attendance_type)
    {
        $request->validate([
            'name'          => 'required|string',
            'time_in'       => 'required|string',
            'time_out'      => 'required|string'
        ]);

        $attendance_type->update([
            'name'          => $request->name,
            'time_in'       => $request->time_in,
            'time_out'      => $request->time_out
        ]);

        return redirect()->route('admin.attendance_types.index');
    }

    public function destroy($id)
    {
        $attendance_type = AttendanceType::findOrFail($id);
        $attendance_type->delete();

        return redirect()->route('admin.attendance_types.index');
    }
}
