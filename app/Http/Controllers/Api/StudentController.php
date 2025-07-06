<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getAllStudents()
    {
        $students = Student::all();

        return response()->json([
            'message' => 'List of students',
            'data' => $students,
        ], 200);
    }

    public function addStudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'face_embedding' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image_url');
        $image->storeAs('public/images', $image->hashName());

        $student = new Student;
        $student->name = $request->name;
        $student->class = $request->class;
        $student->face_embedding = $request->face_embedding;
        $student->image_url = $image->hashName();
        $student->save();

        return response(['message' => 'Student created'], 200);
    }
}
