<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::when(request()->q, function ($students) {
            $students = $students->where('name', 'like', '%' . request()->q . '%');
        })->orderBy('id', 'desc')->paginate(10);

        $students->appends(['q' => request()->q]);

        return inertia('Admin/Students/Index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        return inertia('Admin/Students/Create', []);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'class'         => 'required|string'
        ]);

        Student::create([
            'name'          => $request->name,
            'class'         => $request->class
        ]);

        return redirect()->route('admin.students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return inertia('Admin/Students/Edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'          => 'required|string',
            'class'         => 'required|string'
        ]);

        $student->update([
            'name'          => $request->name,
            'class'         => $request->class
        ]);

        return redirect()->route('admin.students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->image_url && Storage::exists('public/images/' . $student->image_url)) {
            Storage::delete('public/images/' . $student->image_url);
        }

        $student->delete();

        return redirect()->route('admin.students.index');
    }
}
